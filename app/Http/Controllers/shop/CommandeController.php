<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class CommandeController extends Controller
{
    // Afficher le design de la facture
    public function AfficheFacture(Request $request){
        $user = $request->user();

        $content = Cart::getContent();

        // PRIX HORS TAXE DE CHAQUE PRODUIT DANS LE PANIER
        $price_ht = array();

        foreach ($content as $item) {
            $price_ht[] = number_format($item->getPriceSum() / (1 + 0.077), 3, '.', '');
        }

        // TOTAL TTC
        $total_ttc_panier = Cart::getTotal();

        // TOTAL TVA
        $tva = $total_ttc_panier / (1 + 0.077) * 0.077;

        // TOTAL HT
        $total_ht_panier = $total_ttc_panier - $tva;

        return view('facture.facture', ['user' => $user], compact('content', 'price_ht', 'tva', 'total_ttc_panier', 'total_ht_panier'));
    }

}
