<?php
 
use Slim\Http\Request;
use Slim\Http\Response;
 
// Routes
 
$app->get('/', function (Request $request, Response $response, array $args) {
    $this->logger->info("homepage '/' ");

    $categories = $this->database->select("categories",'*',["featured" => 1]);

    $tags = $this->database->select("tags",'*',["ORDER"=>["title"=>"ASC"]]);


    //$cat_tags = $this->database->select("shops_tags",'*',["" => 1]);
    
    $data['categories'] = $categories;
    $data['tags']       = $tags;

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
    if ($site['header']=="") $site['header'] = "../../default/header.jpg";
    if ($site['logo']=="") $site['logo'] = "../../default/logo.jpg";

    if(($site['id'] != $id ) || ($id == 0)):
        return $this->view->render($response, '404.php');
    else:
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
        $related = $this->database->select("shops",'*',
            [
                "categories_id" => $category,
                "id[!]" => $id,
                "active" => 1,
                "featured" => 1,
                "LIMIT" => 3
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

        
        // cargo la variable
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
    // arreglar esto url http://localhost/slim-5/sites/ (en el footer)

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
        $site['thumb_header'] = ($site['header']=="" ? "../../default/thumbnail-header.jpg" : "thumbnail-header.jpg");
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
            "[><]shops" => ["shop_id" => "id"]
        ],
        [
            "shops.id (id_shops)",
            "shops.name",
            "shops.header",
            "shops.logo",
            "shops.alias"
        ],
        [
            "shops_tags.tag_id"=> $id,
            "shops.active" => 1
        ]
    );
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
    if(isset($args['category'])){ $data['ids'] = $id;}
    else {$data['ids'] = 0;}
    
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
    //return $this->response->withHeader('Content-Type','text/xml');
    return $response->withStatus(200)
        ->withHeader('Content-Type', 'text/xml');
});


$app->get('/locationxml2/{ids}/{tags}/[{string}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("sitio '/' id =".$args['id']);

    $ids    = $args['ids'];
    $tags   = $args['tags'];
    if(isset( $args['string'])) $string = $args['string']; else $string = "";
    

    if($tags=="0") { //sin tags
        $query = "SELECT <sh.id>, <sh.name>, <sh.alias>, <sh.header>, <sh.address>, <sh.lat>, <sh.lng>, <sh.schedule>, <ct.category>, <ct.icon>
        FROM <shops> AS <sh>
        INNER JOIN <categories> AS <ct> ON <sh.categories_id> = <ct.id>
        WHERE <ct.id> IN (".$ids.") AND <sh.active> = 1";
    }
    else { //multiples tags
        $query = "SELECT <sh.id>, <sh.name>, <sh.alias>, <sh.header>, <sh.address>, <sh.lat>, <sh.lng>, <sh.schedule>, <ct.category>, <ct.icon>
        FROM <tags> AS <tg>
            INNER JOIN <shops_tags> AS <st> ON <tg.id> = <st.tag_id>
            INNER JOIN <shops> AS <sh> ON <st.shop_id> = <sh.id>
            INNER JOIN <categories> AS <ct> ON <sh.categories_id> = <ct.id>
        WHERE
            <ct.id> IN (".$ids.")
            AND <tg.id> IN (".$tags.")
            AND <sh.active> = 1
            ";
    }

    /*if($string !=""); {
        $query = $query . " AND <sh.name> LIKE '%".$string."%'";
    }*/
    //echo $query;



    
    $sites = $this->database->query($query)->fetchAll();

    foreach ($sites as &$site) {
        $site['header'] = ($site['header']=="" ? "../../default/thumbnail-header.jpg" : "thumbnail-header.jpg");
    }


    $data['sites'] = $sites;



    $this->view->render($response, 'locationxml.php', $data);
    //return $this->response->withHeader('Content-Type','text/xml');
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

    $ids    = $args['ids'];
    if(isset( $args['string'])) $string = $args['string'];

    if(isset($args['string'])){
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
    else{
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
        /*$query = "SELECT <st.id>, <st.nombre>, <st.alias>, <st.thumb>, <st.direccion>, <st.lat>, <st.lng>, <st.horario>, <ct.categoria>, <ct.icono>
        FROM <sites> AS <st>
        INNER JOIN <categories> AS <ct> ON <st.category_id> = <ct.id>
        WHERE <ct.id> IN (".$ids.")";*/
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