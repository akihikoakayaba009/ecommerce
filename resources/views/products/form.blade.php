<div class="form-group custom-form-group">
    <label for="name">nome</label>
    <input type="text" class="form-control custom-form-control" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required>
</div>
<div class="form-group custom-form-group">
    <label for="price">preco</label>
    <input type="text" class="form-control custom-form-control" id="price" name="price" value="{{ old('price', $product->price ?? '') }}" required>
</div>
<div class="form-group custom-form-group">
    <label for="stock">estoque</label>
    <input type="text" class="form-control custom-form-control" id="stock" name="stock" value="{{ old('stock', $product->stock ?? '') }}" required>
</div>
<div class="form-group custom-form-group">
    <label for="cover">Imagem</label>
    <input type="file" id="cover" name="cover" accept="image/*" class="form-control custom-form-control-file" />
</div>
<div class="form-group custom-form-group">
    <label for="description">descricao</label>
    <textarea class="form-control custom-form-control" id="description" name="description" required>{{ old('description', $product->description ?? '') }}</textarea>
</div>
