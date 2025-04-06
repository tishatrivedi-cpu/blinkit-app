@include('header')
<div class="d-flex align-items-center mb-3 ">
    
   <ol class="breadcrumb text-primary" >
                <li class="breadcrumb-item">
                  <i class="bi bi-house lh-1"></i>
                  <a href="/home" class="text-primary">Home</a>
                </li>
                <li class="breadcrumb-item"  aria-current="page"><a href="/subcategory" style="text-decoration: none" class="text-primary">SubCategory</a></li>
                <li class="breadcrumb-item"  aria-current="page">Edit-Subcategory</li>
              </ol>
 </div> 

       <div class="container" style=" background-color: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px var(--shadow-color);width: 100%; max-width: 1000px;">

        <h2 style="margin-top: 0; color: #1A73E8; text-align: center;">Edit SubCategory</h2>
        <form id="category-form" style="display: flex; justify-content: center; flex-direction: column; gap: 1.5rem;"  method="POST" action="{{route("subcategory.update",$subcategory->_id)}}" enctype="multipart/form-data" >
            @csrf
           @method('PUT')

            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                 <label for="" class="form-label">Category Name</label>
                    <select name="category" id="" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid #e1e4e8; border-radius: 4px; font-size: 1rem; transition: border-color 0.3s ease;">
                        @foreach ($categories as $item)
                        @if (strcmp($item->cat_name,$subcategory->category)==0)
                            <option value="{{$item->cat_name}}" selected>{{$item->cat_name}}</option>
                        @else
                           <option value="{{$item->cat_name}}">{{$item->cat_name}}</option>
                        @endif
                            <option value="{{$item->cat_name}}">{{$item->cat_name}}</option>
                        @endforeach
                  </select>
            </div>

            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-name" style="font-weight: 600; font-size: 0.9rem;">SubCategory Name</label>
                <input type="text" id="category-name" name="subcat_name"  value="{{$subcategory->subcat_name}}" placeholder="Enter category name" style="width: 100%; padding: 0.75rem; border: 1px solid #e1e4e8; border-radius: 4px; font-size: 1rem; transition: border-color 0.3s ease;">
                <span class="text-danger">
                        @error('subcat_name')
                            {{$message}}
                        @enderror
                </span>
            </div>
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-image" style="font-weight: 600; font-size: 0.9rem;">SubCategory Image</label>
                <div id="drop-area" style="border: 2px dashed #e1e4e8; border-radius: 4px; padding: 20px; text-align: center; transition: all 0.3s ease; cursor: pointer;">
                    <span style="font-size: 2rem; color: #1A73E8; margin-bottom: 10px;">&#x1F4C2;</span>
                    <p style="margin: 0; font-size: 0.9rem; color: #666;">Drag & Drop your image here or</p>
                    <div style="position: relative; overflow: hidden; display: inline-block; margin-top: 10px;">
                        <button type="button" style="background-color: #1A73E8; color: white; padding: 8px 16px; border-radius: 4px; font-size: 0.9rem; cursor: pointer; transition: background-color 0.3s ease;">Choose File</button>
                        <input type="file" id="cat_pic" name="subcat_pic"  value="{{$subcategory->subcat_pic}}"   accept="image/*"  style="position: absolute; left: 0; top: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%;">
                    </div>
                </div>
                <img id="image-preview" alt="Image preview" src="/placeholder.svg" style="margin-top: 15px; max-width: 100%; height: 150px; border-radius: 4px; object-fit: cover; display: none;">
            </div>
            <button type="submit" style="background-color: #1A73E8; color: white; border: none; padding: 0.75rem; border-radius: 4px; font-size: 1rem; cursor: pointer; transition: background-color 0.3s ease;">Edit SubCategory</button>
            <div class="container m-2" style="display: flex; justify-content: center; align-items: center; " >
        <a href="/subcategory" class="btn btn-primary my-3 col-6 ">Back</a>
             </div>
        </form>
       </div> 
     
   

    <script>
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('category-image');
        const imagePreview = document.getElementById('image-preview');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            dropArea.style.borderColor = '#1A73E8';
            dropArea.style.backgroundColor = 'rgba(74, 144, 226, 0.1)';
        }

        function unhighlight() {
            dropArea.style.borderColor = '#e1e4e8';
            dropArea.style.backgroundColor = 'transparent';
        }

        dropArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        fileInput.addEventListener('change', function() {
            handleFiles(this.files);
        });

        function handleFiles(files) {
            if (files.length > 0) {
                const file = files[0];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                   } //else {
                    // alert('Please select an image file.');
                
            }
        }
    </script>

@include('footer')