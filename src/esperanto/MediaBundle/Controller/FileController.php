<?php

namespace esperanto\MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FileController extends Controller
{
    public function showAction($id,$width,$height)
    {
        if($width) {
            return $this->container->get('esperanto_media.upload')->getCustomImageSizeResponse($id,$width,$height);
        }
        return $this->container->get('esperanto_media.upload')->getResponse($id);
    }

    public function uploadAction(Request $request)
    {
        return $this->container->get('esperanto_media.upload')->upload($request);
    }
}
