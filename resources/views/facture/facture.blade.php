<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Namek - Confirmation </title>
    <!-- Favicons -->
    <link rel="icon" href="{{asset('img/favicon.png')}}" sizes="32x32" type="image/png">
    <style>
        .body{
            font-family:
        }
        .container{
            width: 750px;
            margin:auto;
            padding:50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="invoice-container" ref="document" id="html">
           <table style="width:100%; height:auto;  text-align:center; " BORDER=0 CELLSPACING=0>
             <thead style="background:#499b4a; padding:8px;">
               <tr style="font-size: 20px;">
                 <td colspan="4" style="padding:20px 20px;text-align: left;"><img style="height:120px;width:200px;" src="{{ asset('img/menu/Logo-noir.png')}}"/></td>
               </tr>
             </thead>
             <tbody style="background:#ffff;padding:20px;">
               <tr>
                 <td colspan="4" style="padding:20px 0px 0px 20px;text-align:left;font-size: 20px; font-weight: bold;color:#000;">Bonjour, {{ $user->first_name }}</td>
               </tr>
               <tr>
                 <td colspan="4" style="text-align:center;padding:10px 10px 10px 20px;font-size:25px;font-weight: bold;color:#499b4a">Confirmation de paiement</td>
               </tr>
             </tbody>
           </table>
           <table style="width:100%; height:auto; background-color:#fff;text-align:center; padding:10px; background:#fafafa">
             <tbody>
               <tr style="color:#6c757d; font-size: 20px;">
                 <td style="border-right:1.5px dashed  #DCDCDC; width:25%;font-size:16px;font-weight:700;padding: 0px 0px 10px 0px;">Date de commande</td>
                 <td style="border-right: 1.5px dashed  #DCDCDC ;width:25%;font-size:16px;font-weight:700;padding: 0px 0px 10px 0px;">N° de commande</td>
                 <td style="border-right:1.5px dashed  #DCDCDC ;width:25%;font-size:16px;font-weight:700;padding: 0px 0px 10px 0px;">Paiement</td>
                 <td style="width:25%;font-size:16px;font-weight:700;padding: 0px 0px 10px 0px;">Adresse de livraison</td>
               </tr>
               <tr style="background-color:#fff; font-size:12px; color:#262626;">
                 <td style="border-right:1.5px dashed  #DCDCDC ;width:25%; font-weight:bold;background: #fafafa;">11.07.2021</td>
                 <td style="border-right:1.5px dashed  #DCDCDC ;width:25% ; font-weight:bold;background: #fafafa;">000000001</td>
                 <td style="border-right:1.5px dashed  #DCDCDC ;width:25%; font-weight:bold;background: #fafafa;">CARTE</td>
                 <td style="width:25%; font-weight:bold;background: #fafafa;">Kosovo, Prishtina</td>
               </tr>
             </tbody>
           </table>
           <table style="width:100%; height:auto; background-color:#fff; margin-top:0px;  padding:20px; font-size:12px; border: 1px solid #ebebeb; border-top:0px;">
             <thead>
               <tr style=" color: #6c757d;font-weight: bold; padding: 5px;">
                 <td colspan="2" style="text-align: left;">INFORMATIONS PRODUITS</td>
                 <td style="padding: 10px;text-align:center;">QUANTITE</td>
                 <td style="text-align: center;padding: 10px;">PRIX HT</td>
                 <td style="text-align: center;padding: 10px;">PRIX TTC</td>
               </tr>
             </thead>
             <tbody>
                @foreach($content as $produit)
                    <tr>
                        <td style="width:10%; ">
                        <a href=""><img src="{{ asset('img/Products/'. $produit->attributes['image']) }}" style="width:100px;" /></a>
                        </td>
                        <td style="width:20%;margin-left:10px;text-align: center;">{{$produit->name}}</td>
                        <td style="width:20%;padding: 10px; text-align:center;">{{$produit->quantity}}</td>
                        <td style="width:20%;padding: 10px;text-align: center;">{{ number_format(($price_ht[$loop->index] * (1 + 0.077)) / $produit->quantity, 2) }}</td>
                        <td style="width:30%; ;font-weight: bold;font-size: 16px;">
                        <table style="width:100%;">
                            <tr><td style="text-align:center;font-size:12px;font-weight:600;">{{ number_format($produit->attributes['prix_ttc'], 2) }} CHF</td></tr>
                        </table>
                        </td>
                    </tr>
                @endforeach
             </tbody>
           </table>
           <table style="width:100%; height:auto; background-color:#fff;padding:20px; font-size:12px; border: 1px solid #ebebeb; border-top:0">
             <tbody>
                <tr>
                    <td style="font-weight: bold;padding:5px 0px">TOTAL HT</td>
                    <td style="text-align:right;padding:5px 0px;font-size:16px;">{{number_format($total_ht_panier, 2)}} CHF</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;padding:5px 0px">FRAIS TVA (7.7%)</td>
                    <td style="text-align:right;padding:5px 0px;font-size:16px;">{{number_format($tva, 2)}} CHF</td>
                </tr>
                <tr style="padding:20px;color:#000;font-size:15px">
                    <td style="font-weight: bold;padding:5px 0px">TOTAL TTC</td>
                    <td style="text-align:right;padding:5px 0px;font-weight: bold;font-size:16px;">{{number_format($total_ttc_panier, 2)}} CHF</td>
                </tr>
             </tbody>
             <tfoot style="padding-top:5px;font-weight: bold;">
                <tr>
                    <td style="padding-top:10px;"><span style="color:#499b4a;font-weight: bold">MERCI</span> pour votre confiance !</td>
                </tr>
                <tr>
                    <td style="padding-top:10px;">Besoin d'aide ? Contactez-nous <span style="color:#499b4a">info@namek.com</span></td>
                </tr>
             </tfoot>
           </table>
      </div>
      </div>
</body>
</html>
