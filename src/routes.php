<?php
 
use Slim\Http\Request;
use Slim\Http\Response;
 
// Routes
 
$app->get('/', function (Request $request, Response $response, array $args) {
    $this->logger->info("homepage '/' ");

    $categories = $this->database->select("categories",'*',["featured" => 1]);
    
    $data['categories'] = $categories;

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

        
        // cargo la variable
        $data['site'] = $site;
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
    // $data['fullUrl'] = $_SERVER[REQUEST_SCHEME]."://".$_SERVER[HTTP_HOST].$baseUrl; 

    $categories = $this->database->select("categories",'*',["featured" => 1]);
    $data['categories'] = $categories;

    return $this->view->render($response, 'sites.php', $data);

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



/*$app->get('/buscar/{id}/[{string}]', function (Request $request, Response $response, array $args) {
    $this->logger->info("buscar '/' id =".$args['string']);

    $ids    = $args['ids'];

    $query = "SELECT <st.id>, <st.name>, <st.alias>, <st.header>, <st.address>, <st.lat>, <st.lng>, <st.schedule>, <ct.category>, <ct.icon>
    FROM <shops> AS <st>
    INNER JOIN <categories> AS <ct> ON <st.categories_id> = <ct.id>
    WHERE <ct.id> IN (".$ids.") AND <st.active> = 1";

    
    $sites = $this->database->query($query)->fetchAll();
    $data['sites'] = $sites;

    $this->view->render($response, 'locationxml.php', $data);
    //return $this->response->withHeader('Content-Type','text/xml');
    return $response->withStatus(200)
        ->withHeader('Content-Type', 'text/xml');
});*/


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