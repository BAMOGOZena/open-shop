@component('mail::message')
# Du nouveau sur OpenShop!

## Un nouveau super produit vient d'etre ajouter sur votre superbe plateforme OpenShop

 vous trouverez ci-dessous les informations sur ce nouveau produit
### Désignation: {{ $produit->designation }}
### Prix: {{ $produit->prix }}
### Catégorie: {{ $produit->category->libelle }}

 Pour commander ce produit cliquez juste sur le boutton ci-dessous

@component('mail::button', ['url' => route("produits.show", $produit)])
Commander ce produit
@endcomponent

Merci d'avoir choisi OpenShop pour votre shopping,<br><br>
{{ config('app.name') }}
@endcomponent
