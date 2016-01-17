<?php

use Illuminate\Database\Seeder;
use App\Faq;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('faqs');

          $faq                	= new Faq;
          $faq->question        = "Hoeveel kosten komen er bovenop mijn bod?";
          $faq->awnser          = "Naast het door u geboden bedrag betaalt u ook nog veilingkosten, 17 % opgeld, en BTW. Het BTW percentage wordt bepaald door de soort goederen die aangeboden worden. U doet bv. een bod van 100€, dan wordt het totaal als volgt berekend: 100€ + 17€(kosten)= 117€ + BTW. Deze berekening krijgt u steeds te zien alvorens u het bod moet bevestigen !!";
          $faq->tags            = "kosten bod";
          $faq->save();

          $faq                	= new Faq;
          $faq->question        = "Hoe moet ik betalen?";
          $faq->awnser          = "Wanneer de kavels aan u worden toegewezen, ontvangt u een e-mail met daarin de te betalen som en de betalingsgegevens. U dient dit bedrag dan zo spoedig mogelijk over te schrijven op onze derdenrekening IBAN BE84 1430 6028 1359 BIC GEBABEBB, met de gevraagde vermelding. Bij het afhalen van de goederen dient u een betalingsbewijs voor te leggen. Contant betalen is niet mogelijk!";
          $faq->tags            = "betalen";
          $faq->save();

          $faq                	= new Faq;
          $faq->question        = "Hoe werkt het afhalen?";
          $faq->awnser          = "Op de afhaaldag dient u zich aan te melden bij de veilingverantwoordelijke. Hij controleert of de betaling goed werd ontvangen. Breng voor alle zekerheid steeds een bewijs van betaling mee. Indien de betaling werd ontvangen zal iemand u naar uw goederen begeleiden en de factuur overhandigen. U bent verder zelf verantwoordelijk voor het eventuele demonteren en transporteren van de goederen. Indien u de gekochte goederen zelf niet kan komen ophalen, mag u iemand anders laten komen. Hij/zij dient wel de toewijsmail mee te brengen. Indien de kavels, zonder verwittigen,niet werden opgehaald, wordt een gerechtelijke procedure ingezet om de tegoeden te recupereren.";
          $faq->tags            = "afhalen";
          $faq->save();

          $faq                	= new Faq;
          $faq->question        = "Kunnen kavels opgestuurd worden?";
          $faq->awnser          = "Ja, dat kan. Openbare-verkopen.be werkt met een exclusieve partner, Sibo Delivery, die zich toelegt op het transport van goederen uit onze veilingen. Voor extra info en offertes kan u steeds contact opnemen via sibo.drive@gmail.com met het veilingnummer en de kavelnummers of via hun website.";
          $faq->tags            = "leveren opsturen";
          $faq->save();

          $faq                	= new Faq;
          $faq->question        = "Kan ik goederen retourneren?";
          $faq->awnser          = "Openbare-verkopen.be neemt geen goederen terug. Veilingen per opbod vallen buiten de wet ‘verkoop op afstand’. Wij raden steeds aan gebruik te maken van de kijkdag(en) om vast te stellen of de kavel aan uw verwachtingen voldoet.";
          $faq->tags            = "retourneren";
          $faq->save();
    }
}
