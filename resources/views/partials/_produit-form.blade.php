@csrf
<div class="form-group">
    <label for="">Désignation</label>
    <input required value="{{ old('designation') ?? $produit->designation}}" type="text" name="designation" id="designation" class="form-control" placeholder="" aria-describedby="helpId">
    @error('designation')
        <small  class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Prix</label>
    <input required value="{{ old('prix') ?? $produit->prix}}" type="number" name="prix" id="prix" class="form-control" placeholder="" aria-describedby="helpId">
    @error('prix')
        <small  class="text-danger">{{ $message }}</small>
    @enderror

</div>
<div class="form-group">
    <label for="">Quantité</label>
    <input requird value="{{ old('quantite') ?? $produit->quantite}}" type="number" name="quantite" id="quantite" class="form-control" placeholder="" aria-describedby="helpId">
    @error('quantite')
        <small  class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Catégorie</label>
    <select class="form-control" name="category_id" id="category_id" required>
        @foreach ($categories as $categorie)
            <option {{ $categorie->id==$produit->category_id? "selected" :"" }} value="{{ $categorie->id }}">{{ $categorie->libelle }}></option>
        @endforeach

    </select>
    @error('categorie')
        <small  class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $produit->description}}</textarea>
    @error('description')
        <small  class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
  <label for=""></label>
  <input type="file" name="image" id="image" class="form-control" placeholder="" aria-describedby="helpId">
  @error('description')
  <small id="helpId" class="text-dnger"><small id="helpId" class="text-muted">Image</small></small>
@enderror

</div>
<button type="submit" class="btn btn-primary btn-block btn-lg">Valider</button>
