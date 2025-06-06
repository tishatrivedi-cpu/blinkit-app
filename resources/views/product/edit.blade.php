@include('header')

<div class="d-flex align-items-center mb-3 ">
    
   <ol class="breadcrumb text-primary" >
                <li class="breadcrumb-item">
                  <i class="bi bi-house lh-1"></i>
                  <a href="/home" class="text-primary">Home</a>
                </li>
                <li class="breadcrumb-item"  aria-current="page"><a href="/product" style="text-decoration: none" class="text-primary">Product</a></li>
                <li class="breadcrumb-item"  aria-current="page">Edit-Product</li>
                
              </ol>
 </div>

       <div class="container" style=" background-color: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px var(--shadow-color);width: 100%; max-width: 1000px;">

        <h2 style="margin-top: 0; color: #1A73E8; text-align: center;">Add New Product</h2>
        <form id="category-form" style="display: flex; justify-content: center; flex-direction: column; gap: 1.5rem;"  method="POST" action="{{route("product.update",$product->_id)}}" enctype="multipart/form-data" >
            @csrf
             @method('PUT')

            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                 <label for="" class="form-label">SubCategory Name</label>
                    <select name="subcategory" id="" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid #e1e4e8; border-radius: 4px; font-size: 1rem; transition: border-color 0.3s ease;">
                        @foreach ($subcategories as $item)
                        @if (strcmp($item->subcat_name,$product->subcategory)==0)
                            <option value="{{$item->subcat_name}}" selected>{{$item->subcat_name}}
                            </option>
                        @else
                            <option value="{{$item->subcat_name}}">{{$item->subcat_name}}</option>
                        @endif
                            
                        @endforeach`
                    </select>
                    <span class="text-danger">
                        @error('subcategory')
                            {{$message}}
                        @enderror
                </span>
            </div>

            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-name" style="font-weight: 600; font-size: 0.9rem;">Product Name</label>
                <input type="text" id="pname" name="pname" placeholder="Enter Product name"   value="{{$product->pname}}" style="width: 100%; padding: 0.75rem; border: 1px solid #e1e4e8; border-radius: 4px; font-size: 1rem; transition: border-color 0.3s ease;">
                 @error('pname')
                            {{$message}}
                        @enderror
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-name" style="font-weight: 600; font-size: 0.9rem;">Product Description</label>
                <input type="text" id="pro_desc" name="pro_desc" placeholder="Enter Product Description" 
                value="{{$product->pro_desc}}" style="width: 100%; padding: 0.75rem; border: 1px solid #e1e4e8; border-radius: 4px; font-size: 1rem; transition: border-color 0.3s ease;">
                @error('pro_desc')
                            {{$message}}
                        @enderror
            </div>

            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-name" style="font-weight: 600; font-size: 0.9rem;">Product Discount</label>
                <input type="text" id="pro_disc" name="pro_disc" placeholder="Enter Product Discount" 
                value="{{$product->pro_disc}}" style="width: 100%; padding: 0.75rem; border: 1px solid #e1e4e8; border-radius: 4px; font-size: 1rem; transition: border-color 0.3s ease;">
                @error('pro_disc')
                            {{$message}}
                        @enderror
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-name" style="font-weight: 600; font-size: 0.9rem;">Product Price</label>
                <input type="text" id="pro_price" name="pro_price" placeholder="Enter Product Price" 
                value="{{$product->pro_price}}" style="width: 100%; padding: 0.75rem; border: 1px solid #e1e4e8; border-radius: 4px; font-size: 1rem; transition: border-color 0.3s ease;">
                <span class="text-danger">
                        @error('pro_price')
                            {{$message}}
                        @enderror
                </span>
            </div>
            
            
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-image" style="font-weight: 600; font-size: 0.9rem;">Product Image1</label>
                <div id="drop-area" style="border: 2px dashed #e1e4e8; border-radius: 4px; padding: 20px; text-align: center; transition: all 0.3s ease; cursor: pointer;">
                    <span style="font-size: 2rem; color: #1A73E8; margin-bottom: 10px;">&#x1F4C2;</span>
                    <p style="margin: 0; font-size: 0.9rem; color: #666;">Drag & Drop your image here or</p>
                    <div style="position: relative; overflow: hidden; display: inline-block; margin-top: 10px;">
                        <button type="button" style="background-color: #1A73E8; color: white; padding: 8px 16px; border-radius: 4px; font-size: 0.9rem; cursor: pointer; transition: background-color 0.3s ease;">Choose File</button>
                        <input type="file" id="pro_pic1" name="pro_pic1" accept="image/*" value="{{$product->pro_pic1}}" style="position: absolute; left: 0; top: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%;">
                    </div>
                </div>
                <img id="image-preview" alt="Image preview" src="/placeholder.svg" style="margin-top: 15px; max-width: 100%; height: 150px; border-radius: 4px; object-fit: cover; display: none;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-image" style="font-weight: 600; font-size: 0.9rem;">Product Image2</label>
                <div id="drop-area" style="border: 2px dashed #e1e4e8; border-radius: 4px; padding: 20px; text-align: center; transition: all 0.3s ease; cursor: pointer;">
                    <span style="font-size: 2rem; color: #1A73E8; margin-bottom: 10px;">&#x1F4C2;</span>
                    <p style="margin: 0; font-size: 0.9rem; color: #666;">Drag & Drop your image here or</p>
                    <div style="position: relative; overflow: hidden; display: inline-block; margin-top: 10px;">
                        <button type="button" style="background-color: #1A73E8; color: white; padding: 8px 16px; border-radius: 4px; font-size: 0.9rem; cursor: pointer; transition: background-color 0.3s ease;">Choose File</button>
                        <input type="file" id="pro_pic2" name="pro_pic2" accept="image/*" value="{{$product->pro_pic2}}"  style="position: absolute; left: 0; top: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%;">
                    </div>
                </div>
                <img id="image-preview" alt="Image preview" src="/placeholder.svg" style="margin-top: 15px; max-width: 100%; height: 150px; border-radius: 4px; object-fit: cover; display: none;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-image" style="font-weight: 600; font-size: 0.9rem;">Product Image3</label>
                <div id="drop-area" style="border: 2px dashed #e1e4e8; border-radius: 4px; padding: 20px; text-align: center; transition: all 0.3s ease; cursor: pointer;">
                    <span style="font-size: 2rem; color: #1A73E8; margin-bottom: 10px;">&#x1F4C2;</span>
                    <p style="margin: 0; font-size: 0.9rem; color: #666;">Drag & Drop your image here or</p>
                    <div style="position: relative; overflow: hidden; display: inline-block; margin-top: 10px;">
                        <button type="button" style="background-color: #1A73E8; color: white; padding: 8px 16px; border-radius: 4px; font-size: 0.9rem; cursor: pointer; transition: background-color 0.3s ease;">Choose File</button>
                        <input type="file" id="pro_pic3" name="pro_pic3" accept="image/*" value="{{$product->pro_pic3}}"  style="position: absolute; left: 0; top: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%;">
                    </div>
                </div>
                <img id="image-preview" alt="Image preview" src="/placeholder.svg" style="margin-top: 15px; max-width: 100%; height: 150px; border-radius: 4px; object-fit: cover; display: none;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-name" style="font-weight: 600; font-size: 0.9rem;">Self Life</label>
                <input type="text" id="self-life" name="self_life" placeholder="Enter Product Self Life<"
                 value="{{$product->self_life}}"  style="width: 100%; padding: 0.75rem; border: 1px solid #e1e4e8; border-radius: 4px; font-size: 1rem; transition: border-color 0.3s ease;">
                 <span class="text-danger">
                        @error('self-life')
                            {{$message}}
                        @enderror
                </span>
            </div>

                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="veg" id="flexRadioDefault1"> 
                         <label class="form-check-label" for="flexRadioDefault1" >
                        Veg
                        </label>
                    </div>
                <div class="form-check">
                            <input class="form-check-input" type="radio" name="nonveg" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                        Nonveg
                        </label>
                    </div>
                
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-name" style="font-weight: 600; font-size: 0.9rem;">Unit</label>
                <input type="text" id="pro_unit" name="pro_unit" placeholder="Enter Product Unit"  
                value="{{$product->pro_unit}}" style="width: 100%; padding: 0.75rem; border: 1px solid #e1e4e8; border-radius: 4px; font-size: 1rem; transition: border-color 0.3s ease;">
                <span class="text-danger">
                        @error('pro_unit')
                            {{$message}}
                        @enderror
                </span>
            </div>

             <div class="mb-3">
                <label class="form-label" for="yEmail">Select Packging Type</label>
                <select name="pack_type" id="" class="form-select">
                        <option value="Container" selected>Container</option>
                        <option value="Polithin Bag" selected>Polithin Bag</option>
                        <option value="Paper Bag" selected>Paper Bag</option>
                </select>
                <span class="text-danger">
                        @error('pack_type')
                            {{$message}}
                        @enderror
                </span>
                </div>

            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-name" style="font-weight: 600; font-size: 0.9rem;">Country Of Origin</label>
                <input type="text" id="countryoforigin" name="countryoforigin"  placeholder="Enter Country Of Origin"  
                value="{{$product->countryoforigin}}" style="width: 100%; padding: 0.75rem; border: 1px solid #e1e4e8; border-radius: 4px; font-size: 1rem; transition: border-color 0.3s ease;">
                <span class="text-danger">
                        @error('countryoforigin')
                            {{$message}}
                        @enderror
                </span>
            </div>


            <button type="submit" style="background-color: #0968f6; color: white; border: none; padding: 0.75rem; border-radius: 4px; font-size: 1rem; cursor: pointer; transition: background-color 0.3s ease;">Edit Product</button>

              <div class="container m-2" style="display: flex; justify-content: center; align-items: center; " >
        <a href="/product" class="btn btn-primary my-3 col-6 ">Back</a>
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
                } else {
                    alert('Please select an image file.');
                }
            }
        }
    </script>




@include('footer')
 



