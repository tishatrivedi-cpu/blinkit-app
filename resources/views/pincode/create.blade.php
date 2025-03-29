@include('header')


<div class="d-flex align-items-center mb-3 ">
    
   <ol class="breadcrumb text-primary" >
                <li class="breadcrumb-item">
                  <i class="bi bi-house lh-1"></i>
                  <a href="/home" class="text-primary">Home</a>
                </li>
                <li class="breadcrumb-item"  aria-current="page">Pincode</li>
                <li class="breadcrumb-item"  aria-current="page">Create-Pincode</li>
                
              </ol>
 </div>

       <div class="container" style=" background-color: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px var(--shadow-color);width: 100%; max-width: 1000px;">

        <h2 style="margin-top: 0; color: #1A73E8; text-align: center;">Add New Pincode</h2>
        <form id="category-form" style="display: flex; justify-content: center; flex-direction: column; gap: 1.5rem;"  method="POST" action="{{route("pincode.store")}}" enctype="multipart/form-data" >
            @csrf

            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-name" style="font-weight: 600; font-size: 0.9rem;">Locality</label>
                <input type="text" id="" name="locality"  placeholder="Enter Locality" style="width: 100%; padding: 0.75rem; border: 1px solid #e1e4e8; border-radius: 4px; font-size: 1rem; transition: border-color 0.3s ease;">
                <span class="text-danger">
                        @error('locality')
                            {{$message}}
                        @enderror
                </span>
            </div>


            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <label for="category-name" style="font-weight: 600; font-size: 0.9rem;">Pincode</label>
                <input type="text" id="" name="pincode" placeholder="Enter Pincode" style="width: 100%; padding: 0.75rem; border: 1px solid #e1e4e8; border-radius: 4px; font-size: 1rem; transition: border-color 0.3s ease;">
                <span class="text-danger">
                        @error('pincode')
                            {{$message}}
                        @enderror
                </span>
            </div>

             

           
            <button type="submit" style="background-color: #1A73E8; color: white; border: none; padding: 0.75rem; border-radius: 4px; font-size: 1rem; cursor: pointer; transition: background-color 0.3s ease;">Add Pincode</button>

             <div class="container m-2" style="display: flex; justify-content: center; align-items: center; " >
        <a href="/pincode" class="btn btn-primary my-3 col-6 ">Back</a>
             </div>
        </form>
       </div> 
     
   

    




@include('footer')
 



