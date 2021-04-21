<label class="col-md-4 col-form-label"><b>Page &nbsp;<span class="text-danger">*</span> </b></label>
<select name="page_id" id="pageId" class="col-md-8 form-control">
    @foreach ($pages as $item)
        <option value="{{$item->id}}">{{$item->page_name}}</option>
    @endforeach
</select>