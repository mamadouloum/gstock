<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Famille;
use App\Form\FamilleType;
use App\Repository\FamilleRepository;
use Symfony\Component\Routing\Annotation\Route;

class FamilleController extends AbstractController
{
    /**
     * @Route("/famille", name="famille")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Famille::class);
        $f = $repository->findAll();
        return $this->render('famille/index.html.twig', [
            'f' => $f,
        ]);
    }

    /**
     * @Route("/addfamille", name="famille_new")
     */
    public function add(Request $request)
    {
        $fam = new Famille();
        $f = $this->createFormBuilder($fam)
        ->add('libelle', TextType::class, array(
            'attr' => array('class' => 'form-control'),
            ))
        ->add('save', SubmitType::class, array(
            'label' => 'Valider'
        ))
        ->getForm();
        $f->handleRequest($request);
        if($f->isSubmitted() && $f->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fam);
            $em->flush();
        }
        $repository = $this->getDoctrine()->getRepository(Famille::class);
        $fams = $repository->findAll();

        return $this->render('famille/add.html.twig',
        ['f'=> $f->createView(), 'fams' => $fams]);
    }

    /**
     * @Route("/delete_fammille/{id}", name="del_famille")
     */

     public function delFamille($id=null)
     {
         $repository = $this->getDoctrine()->getRepository(Famille::class);
         $fam = $repository->find($id);
         $em=$this->getDoctrine()->getManager();

         $em->remove($fam);
         $em->flush();

         return $this->redirectToRoute('addfamille');
     }
}
