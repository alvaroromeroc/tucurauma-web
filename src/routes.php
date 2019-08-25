<?php
 
use Slim\Http\Request;
use Slim\Http\Response;
 
// Routes
 
$app->get('/web[/]', function ($request, $response, $args) { 

    return $response->withRedirect('/'); 
});


$app->get('/', function (Request $request, Response $response, array $args) {
    $this->logger->info("homepage '/' ");

    $categories = $this->database->select("categories",'*',["featured" => 1]);

    //$tags = $this->database->select("tags",'*',["ORDER"=>["title"=>"ASC"]]);

    // tiendas relacionadas
    $related = $this->database->rand("shops",
        [
            "[><]categories" => ["shops.categories_id" => "id"]
        ],
        [
            "categories.id (id_category)",
            "categories.category",
            "shops.id (id)",
            "shops.name",
            "shops.header",
            "shops.logo",
            "shops.alias",
            "shops.address",
        ],
        [
            "shops.active" => 1,
            "shops.featured" => 1,
            "LIMIT" => 4
        ]
    );
    
    foreach ($related as &$rel) {
          $rel['thumb_header'] = ($rel['header']=="" ? "../../default/thumbnail-header.jpg" : "thumbnail-header.jpg");
          $rel['thumb_logo'] = ($rel['logo']=="" ? "../../default/thumbnail-logo.jpg" : "thumbnail-logo.jpg");
    }  

    //$cat_tags = $this->database->select("shops_tags",'*',["" => 1]);
    
    $data['categories'] = $categories;
    $data['related'] = $related;
    //$data['tags']       = $tags;

    return $this->view->render($response, 'homepage.php',$data);
});
 

$app->get('/curauma',function(Request $request, Response $response, array $args) {
    $this->logger->info("about '/' ");

	$data = array(
    		"main_heading"=>"Acerca de Curauma",
    		"sub_heading" => "Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum"
    		);
    return $this->view->render($response, 'about.php',$data);
});


$app->get('/site/{id}[/]', function (Request $request, Response $response, array $args) {
    $this->logger->info("site '/' id =".$args['id']);

    $id = (int)$args['id'];
    $site = $this->database->get("shops",'*',
        ["id" => $id, "active" => 1]
    );
    

    if(($site['id'] != $id ) || ($id == 0)):
        return $this->view->render($response, '404.php');
    else:
        if ($site['header']=="") $site['header'] = "../../default/header.jpg";
        if ($site['logo']=="") $site['logo'] = "../../default/logo.jpg";

        $category = $site['categories_id'];

        // productos de la tienda
        $products = $this->database->select("products",'*',
            [
                "shops_id" => $id
            ]
        );
        foreach ($products as &$product) {
            if ($product['image']=="") $product['image'] = "../../default/product.jpg";
        }        

        // tiendas relacionadas
        $related = $this->database->rand("shops",
            [
                "[><]categories" => ["shops.categories_id" => "id"]
            ],
            [
                "categories.id (id_category)",
                "categories.category",
                "shops.id (id)",
                "shops.name",
                "shops.header",
                "shops.logo",
                "shops.alias",
                "shops.address",
            ],            
            [
                "shops.id[!]" => $id,
                "shops.active" => 1,
                "shops.featured" => 1,
                "LIMIT" => 4
            ]
        );
        foreach ($related as &$rel) {
            $rel['thumb_header'] = ($rel['header']=="" ? "../../default/thumbnail-header.jpg" : "thumbnail-header.jpg");
            $rel['thumb_logo'] = ($rel['logo']=="" ? "../../default/thumbnail-logo.jpg" : "thumbnail-logo.jpg");
        }

        //etiquetas 
        $tags = $this->database->select("shops_tags",
            [
                "[><]tags" => ["tag_id" => "id"]
            ],
            [
                "tags.id",
                "tags.title"
            ],
            [
                "shops_tags.shop_id"=> $id
            ]
        );

        
        // cargo los data
        $data['site'] = $site;
        $data['tags'] = $tags;
        $data['products'] = $products;
        $data['related'] = $related;

        return $this->view->render($response, 'site.php', $data);
    endif;
});


$app->get('/sites/[{category}/]', function (Request $request, Response $response, array $args) {
    if(isset($args['category']))
        $this->logger->info("sites '/' id =".$args['category']);
    else 
        $this->logger->info("sites '/' id = index");

    if(isset($args['category'])):
        $id = (int)$args['category'];
        $sites = $this->database->select("categories",
        [
            "[><]shops" => ["id" => "categories_id"]
        ],
        [
            "categories.id",
            "categories.category",
            "shops.id (id_shops)",
            "shops.name",
            "shops.header",
            "shops.logo",
            "shops.alias"
        ],
        [
            "categories.id"=> $id,
            "shops.active" => 1
        ]
    );
    else:
        $sites = $this->database->select("categories",
        [
            "[><]shops" => ["id" => "categories_id"]
        ],
        [
            "categories.id",
            "categories.category",
            "shops.id (id_shops)",
            "shops.name",
            "shops.header",
            "shops.logo",
            "shops.alias"
        ],
        [
            "shops.active" => 1
        ]);
    endif;

    foreach ($sites as &$site) {
        $site['thumb_header'] = ($site['header']=="" ? "../../default/thumbnail-header.jpg" : "tiendas/18/thumbnail-header.jpg");
        $site['thumb_logo'] = ($site['logo']=="" ? "../../default/thumbnail-logo.jpg" : "thumbnail-logo.jpg");
        if ($site['header']=="") $site['header'] = "../../default/header.jpg";
        if ($site['logo']=="") $site['logo'] = "../../default/logo.jpg";
    }

    $data['sites'] = $sites;
    if(isset($args['category'])){ $data['ids'] = $id;}
    else {$data['ids'] = 0;}
    
    $categories = $this->database->select("categories",'*',["featured" => 1]);
    $data['categories'] = $categories;

    return $this->view->render($response, 'sites.php', $data);

});


$app->get('/categoria/[{category}/]', function (Request $request, Response $response, array $args) {
    
    if(isset($args['category']))
        $this->logger->info("categorias| '/' id =".$args['category']);
    else 
        $this->logger->info("categorias| '/' id = index");


    if(isset($args['category'])):
        $id = (int)$args['category'];
        $category = $this->database->select("categories", "category", ["id" => $id]);
        if (count($category)==0){
            return $this->view->render($response->withStatus(404), '404.php', [
                "myError" => "Error"
            ]);
        }
        else {

            $sites = $this->database->select("categories",
                [
                    "[><]shops" => ["id" => "categories_id"]
                ],
                [
                    "categories.id",
                    "categories.category",
                    "shops.id (id_shops)",
                    "shops.name",
                    "shops.header",
                    "shops.logo",
                    "shops.alias"
                ],
                [
                    "categories.id"=> $id,
                    "shops.active" => 1
                ]
            );

            foreach ($sites as &$site) {
                $site['thumb_header'] = ($site['header'] == "" ) ? "../../default/thumbnail-header.jpg" : "thumbnail-header.jpg";
                $site['thumb_logo'] = ($site['logo']=="") ? "../../default/thumbnail-logo.jpg" : "thumbnail-logo.jpg";
                if ($site['header']=="") $site['header'] = "../../default/header.jpg";
                if ($site['logo']=="") $site['logo'] = "../../default/logo.jpg";
            }

            $data['sites'] = $sites;
        }
    else:
        $a=1;
    endif;
    
    if(isset($args['category'])){ $data['ids'] = $id;}
    else {$data['ids'] = 0;}
    
    $categories = $this->database->select("categories",'*',["featured" => 1]);
    $data['categories'] = $categories;
    $data['category'] = $category;

    return $this->view->render($response, 'category.php', $data);
});


$app->get('/etiquetas/{id}[/]', function (Request $request, Response $response, array $args) {
    if(isset($args['id']))
        $this->logger->info("tags '/' id =".$args['id']);
    else 
        $this->logger->info("tags '/'");
    // arreglar esto url http://localhost/slim-5/sites/ (en el footer)

    if(isset($args['id'])):
        $id = (int)$args['id'];
        $sites = $this->database->select("shops_tags",
            [
                "[><]shops" => ["shop_id" => "id"],
                "[><]categories" => ["shops.categories_id" => "id"]
            ],
            [
                "shops.id (id_shops)",
                "shops.name",
                "shops.header",
                "shops.logo",
                "shops.alias",
                "shops.address",
                "categories.category",
            ],
            [
                "shops_tags.tag_id"=> $id,
                "shops.active" => 1
            ]
        );
        $data['tag'] = $this->database->get("tags",'*',["id"=>$id]);
    else:
        return $this->view->render($response, '404.php');
    endif;

    foreach ($sites as &$site) {
        $site['thumb_header'] = ($site['header']=="" ? "../../default/thumbnail-header.jpg" : "thumbnail-header.jpg");
        $site['thumb_logo'] = ($site['logo']=="" ? "../../default/thumbnail-logo.jpg" : "thumbnail-logo.jpg");
        if ($site['header']=="") $site['header'] = "../../default/header.jpg";
        if ($site['logo']=="") $site['logo'] = "../../default/logo.jpg";
    }

    $data['sites'] = $sites;
    /*if(isset($args['category'])){ $data['ids'] = $id;}
    else {$data['ids'] = 0;}*/
    
    $categories = $this->database->select("categories",'*',["featured" => 1]);
    $data['categories'] = $categories;

    

    return $this->view->render($response, 'tags.php', $data);

});


$app->get('/locationxml/{ids}/[{string}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("sitio '/' id =".$args['id']);

    $ids    = $args['ids'];

    $query = "SELECT <st.id>, <st.name>, <st.alias>, <st.header>, <st.address>, <st.lat>, <st.lng>, <st.schedule>, <ct.category>, <ct.icon>
    FROM <shops> AS <st>
    INNER JOIN <categories> AS <ct> ON <st.categories_id> = <ct.id>
    WHERE <ct.id> IN (".$ids.") AND <st.active> = 1";
    
    $sites = $this->database->query($query)->fetchAll();

    foreach ($sites as &$site) {
        $site['header'] = ($site['header']=="" ? "../../default/thumbnail-header.jpg" : "thumbnail-header.jpg");
    }

    $data['sites'] = $sites;

    $this->view->render($response, 'locationxml.php', $data);

    return $response->withStatus(200)
        ->withHeader('Content-Type', 'text/xml');
});


$app->get('/locationjson/{ids}/{limit}/[{string}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("sitio '/' id =".$args['id']);

    $ids    = $args['ids'];
    $limit  = $args['limit'];
    $inicio = ($limit-1)*12;
    //$fin    = $limit*12;

    if($ids==0):
        $query = "SELECT <st.id>, <st.name>, <st.alias>, <st.header>, <st.logo>, <st.address>, <st.lat>, <st.lng>, <st.schedule>, <ct.category>, <ct.icon>
        FROM <shops> AS <st>, <categories> AS <ct>
        WHERE <st.active> = 1 AND <st.categories_id> = <ct.id>
        LIMIT ".$inicio.",12";
    else:
        $query = "SELECT <st.id>, <st.name>, <st.alias>, <st.header>, <st.logo>, <st.address>, <st.lat>, <st.lng>, <st.schedule>, <ct.category>, <ct.icon>
        FROM <shops> AS <st>
        INNER JOIN <categories> AS <ct> ON <st.categories_id> = <ct.id>
        WHERE <ct.id> IN (".$ids.") AND <st.active> = 1
        LIMIT ".$inicio.",12";        
    endif;
    //echo $args['ids'];
    //echo $query;
    
    $sites = $this->database->query($query)->fetchAll();

    foreach ($sites as &$site) {
        $site['header'] = ($site['header']=="" ? "../../default/thumbnail-header.jpg" : "thumbnail-header.jpg");
        $site['logo'] = ($site['logo']=="" ? "../../default/thumbnail-logo.jpg" : "thumbnail-logo.jpg");
    }

    $data['sites'] = $sites;

    $this->view->render($response, 'locationjson.php', $data);
    //return $this->response->withHeader('Content-Type','text/xml');
    return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json');
});




$app->get('/buscar/{ids}/[{string}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("buscar '/' id =".$args['string']);

    $ids_aux    = $args['ids'];
    $ids = explode(",", $ids_aux);

    if(isset($args['string'])) {
        $string = $args['string'];
        $sites = $this->database->select("categories",
            [
                "[><]shops" => ["id" => "categories_id"]
            ],
            [
                "categories.category",
                "categories.icon",
                "shops.id",
                "shops.name",
                "shops.alias",
                "shops.header",
                "shops.logo",
                "shops.address",
                "shops.lat",
                "shops.lng",
                "shops.schedule"
            ],
            [
                "categories.id"=> $ids,
                "shops.name[~]" => $string,
                "shops.active" => 1
            ]
        );
    }
    else {
        $sites = $this->database->select("categories",
            [
                "[><]shops" => ["id" => "categories_id"]
            ],
            [
                "categories.category",
                "categories.icon",
                "shops.id",
                "shops.name",
                "shops.alias",
                "shops.header",
                "shops.logo",
                "shops.address",
                "shops.lat",
                "shops.lng",
                "shops.schedule"
            ],
            [
                "categories.id"=> $ids,
                "shops.active" => 1
            ]
        );
    }

    foreach ($sites as &$site) {
        $site['thumb_header'] = ($site['header']=="" ? "../../default/thumbnail-header.jpg" : "thumbnail-header.jpg");
        $site['thumb_logo'] = ($site['logo']=="" ? "../../default/thumbnail-logo.jpg" : "thumbnail-logo.jpg");
        if ($site['header']=="") $site['header'] = "../../default/header.jpg";
        if ($site['logo']=="") $site['logo'] = "../../default/logo.jpg";
    }

    $data['sites'] = $sites;

    $categories = $this->database->select("categories",'*',["featured" => 1]);
    $data['categories'] = $categories;
    
    return $this->view->render($response, 'buscar.php', $data);
});


$app->post('/mensaje/',function(Request $request, Response $response, array $args) {
    $this->logger->info("mensaje '/' ");

    $data = $request->getParams();

    $message = "
    <p>Nuevo Mensaje de TuCurauma.cl</p>

    <br/>
    
    <table style=\"border-collapse: collapse; border: 1px solid grey; \">
    <tbody>
        <tr>
            <td style=\"border: 1px solid grey; background-color:#f8f8f8; padding: 2px 7px;\"><p><strong>Nombre</strong></p></td>
            <td style=\"border: 1px solid grey; padding: 2px 7px;\"><p>".$data['inputNombre']."</p></td>
        </tr>
        <tr>
            <td style=\"border: 1px solid grey; background-color:#f8f8f8; padding: 2px 7px;\"><p><strong>Correo</strong></p></td>
            <td style=\"border: 1px solid grey; padding: 2px 7px;\"><p>".$data['inputCorreo']."</p></td>
        </tr>
        <tr>
            <td style=\"border: 1px solid grey; background-color:#f8f8f8; padding: 2px 7px;\"><p><strong>Teléfono</strong></p></td>
            <td style=\"border: 1px solid grey; padding: 2px 7px;\"><p>".$data['inputTelefono']."</p></td>
        </tr>
        <tr>
            <td style=\"border: 1px solid grey; background-color:#f8f8f8; padding: 2px 7px;\"><p><strong>Mensaje</strong></p></td>
            <td style=\"border: 1px solid grey; padding: 2px 7px;\"><p>".$data['inputMensaje']."</p></td>
        </tr>
    </tbody>
    </table>

    <br/>
    <hr/>
    <p>*Este mensaje es generado automaticamente por el sistema. Por Favor no responda a este mensaje.</p><br/><br/><br/>
    <img src=\"https://www.tucurauma.cl/web/assets/img/tu-curauma-logo.png\">
    ";

    try {
       $this->mailer->setFrom('contacto@tucurauma.cl', 'Tu Curauma'); /*email confirmación empresa a cliente*/
       $this->mailer->addAddress('contacto@tucurauma.cl', 'Tu Curauma');
       $this->mailer->Subject = 'Mensaje desde TuCurauma.cl';
       $this->mailer->isHTML(TRUE);
       $this->mailer->Body = $message;
       $this->mailer->CharSet = 'UTF-8';

       $this->mailer->send();

       $data['success'] = TRUE;
       $data['msg'] = 'Su mensaje fue enviado.<br /> Nos pondremos en contacto con usted.';
    }
    catch (Exception $e)
    {
        $data['success'] = FALSE;
        //$data['errorMsg'] = $e->errorMessage();
        $data['msg'] = 'Lo sentimos. Su mensaje no fue enviado.<br />Favor intente más tarde o contáctenos en <a href="mailto:contacto@tucurauma.cl">contacto@tucurauma.cl</a>';
        $this->logger->info("mensaje error".$e->errorMessage());
    }
    catch (\Exception $e)
    {
       $data['success'] = FALSE;
       //$data['errorMsg'] = $e->getMessage();
       $data['msg'] = 'Lo sentimos. Su mensaje no fue enviado.<br />Favor intente más tarde o contactenos en <a href="mailto:contacto@tucurauma.cl">contacto@tucurauma.cl</a>';
       $this->logger->info("mensaje error".$e->errorMessage());
    }

    //agregar el mensaje de data[]
    


    return $this->view->render($response, 'mensaje.php',$data);
});