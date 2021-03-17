<label class="col-md-4 col-form-label"><b>Category &nbsp;<span class="text-danger">*</span> </b></label>
<select name="category_id" id="categoryId" class="col-md-8 form-control">
    @foreach ($categories as $item)
        <option value="{{$item->id}}">{{$item->category_name}}</option>
    @endforeach
</select>