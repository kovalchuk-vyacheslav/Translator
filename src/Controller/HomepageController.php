<?php

namespace App\Controller;

use App\Entity\TranslatedText;
use App\Form\TranslatedTextType;
use Pryon\GoogleTranslatorBundle\Service\GoogleTranslator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request): Response
    {
        $translatedText = new TranslatedText();

        $form = $this->createForm(TranslatedTextType::class, $translatedText);

        $form->handleRequest($request);

        $data = [
            'form' => $form->createView(),
        ];

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var TranslatedText $translatedText */
            $translatedText = $form->getData();

            $data['formattedText'] = $translatedText->getFormattedText();
        }

        return $this->render('homepage/index.html.twig', $data);
    }

    /**
     * @Route("/translate", name="translate")
     */
    public function translate(
        Request $request,
        GoogleTranslator $googleTranslator
    ): Response {
        $word = $request->query->get('word');

        $translation = $googleTranslator->translate('en', 'ru', $word);

        return $this->json([
            'translation' => $translation,
        ]);
    }
}
