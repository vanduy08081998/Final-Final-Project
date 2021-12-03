 <!-- Product panels-->
 <div class="accordion mb-4" id="productPanels">
   <div class="accordion-item">
     <h3 class="accordion-header"><a class="accordion-button" href="#shippingOptions" role="button" data-bs-toggle="collapse"
         aria-expanded="true" aria-controls="shippingOptions"><i class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Tùy
         chọn vận chuyển</a></h3>
     <div class="accordion-collapse collapse show" id="shippingOptions" data-bs-parent="#productPanels">
       <div class="accordion-body fs-sm">
         <div class="d-flex justify-content-between border-bottom pb-2">
           <div>
             <div class="fw-semibold text-dark">Ngày vận chuyển ước tính
             </div>
             <div class="fs-sm text-muted">
               {{ $product->shipping_day }} Ngày</div>
           </div>
         </div>
         <div class="d-flex justify-content-between border-bottom py-2">
           <div>
             <div class="fw-semibold text-dark">Phí vận chuyển</div>
             @if ($product->shipping_stock == null)
               <div class="fs-sm text-muted">
                 {{ $product->shipping_type }}</div>
             @else
               <div class="fs-sm text-muted">
                 {{ $product->shipping_stock }} VND</div>
             @endif

           </div>

         </div>
         <div class="d-flex justify-content-between pt-2">
           <div>
             <div class="fw-semibold text-dark">VAT</div>
             <div class="fs-sm text-muted">
               {{ $product->vat }}{{ $product->vat_unit }}</div>
           </div>

         </div>
       </div>
     </div>
   </div>
   <div class="accordion-item">
     <h3 class="accordion-header"><a class="accordion-button collapsed" href="#localStore" role="button" data-bs-toggle="collapse"
         aria-expanded="true" aria-controls="localStore"><i class="ci-location text-muted fs-lg align-middle mt-n1 me-2"></i>Find
         in local store</a></h3>
     <div class="accordion-collapse collapse" id="localStore" data-bs-parent="#productPanels">
       <div class="accordion-body">
         <select class="form-select">
           <option value>Select your country</option>
           <option value="Argentina">Argentina</option>
           <option value="Belgium">Belgium</option>
           <option value="France">France</option>
           <option value="Germany">Germany</option>
           <option value="Spain">Spain</option>
           <option value="UK">United Kingdom</option>
           <option value="USA">USA</option>
         </select>
       </div>
     </div>
   </div>
 </div>
 <!-- Sharing-->
 <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i
     class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i
     class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
