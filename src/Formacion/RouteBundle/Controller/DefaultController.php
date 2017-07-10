<?php

namespace Formacion\RouteBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="route_simple_example")
     */
    public function simpleRouteAction()
    {
        return $this->render('FormacionRouteBundle:Default:index.html.twig');
    }

    /**
     * @Route("/get/simple/{param}", name="route_example_with_param")
     * @param string $param
     * @return Response
     */
    public function simpleRouteWithParam($param) {
        return new JsonResponse([
            'param' => $param
        ], 200);
    }

    /**
     * @Route("/get/param/{parameter}", name="route_example_with_letters_validation",
     *     requirements={"parameter":"[a-zA-Z]{3,}"}
     * )
     * @param string $parameter
     * @return Response
     */
    public function routeWithLetterParamValidation($parameter) {
        return new Response("El parámetro es " . $parameter, 200);
    }

    /**
     * @Route("/get/param/{parameter}", name="route_example_with_number_validation",
     *     requirements={"parameter":"[0-9]{1,8}"}
     * )
     * @param string $parameter
     * @return Response
     */
    public function routeWithNumberParamValidation($parameter) {
        return new Response("El numero es " . $parameter, 200);
    }

    /**
     * @Route("/get/default/{parameter}", name="route_example_with_default_param",
     *     requirements={"parameter":"[a-zA-Z]{1,8}"},
     *     defaults={"parameter":"valor por defecto"}
     * )
     * @param string $parameter
     * @return Response
     */
    public function routeWithDefaultParam($parameter) {
        return new Response("El valor por defecto es " . $parameter, 200);
    }

    /**
     * @Route("/post", name="route_example_with_other_method")
     * @Method("POST")
     * @return Response
     */
    public function routeWithOtherMethod() {
        return new JsonResponse("Sólo accesible por POST", 200);
    }
}
