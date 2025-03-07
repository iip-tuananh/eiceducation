<div class="widget">
   <h4 class="title">Yêu cầu tư vấn</h4>
   <form id="commentform">
      <div class="row">
         <div class="col-md-12">
            <div class="form-group">
               <div class="form-icon">
                  <i class="far fa-user-tie"></i>
                  <input type="text" class="form-control" name="name" placeholder="Họ Tên">
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
               <div class="form-icon">
                  <i class="far fa-phone"></i>
                  <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
               <div class="form-icon">
                  <i class="far fa-envelope"></i>
                  <input type="email" class="form-control" name="email" placeholder="Email">
               </div>
            </div>
         </div>
        
         <div class="col-md-12">
            <div class="form-group">
               <div class="form-icon">
                  <i class="far fa-earth-americas"></i>
               <select class="select" name="service">
                  <option value="">Du học tại</option>
                  @foreach ($categoryhome as $item)
                  <option value="{{languageName($item->name)}}">{{languageName($item->name)}}</option>
                  @endforeach
               </select>
               </div>
            </div>
         </div>
         <div class="col-md-12">
          <div class="form-group">
             <div class="form-icon">
                <i class="far fa-school"></i>
                <select class="select" name="service">
                   <option value="">Cấp Học *</option>
                   <option value="THPT">THPT</option>
                   <option value="THPT">Cao đẳng</option>
                   <option value="THPT">Dự bị đại học</option>
                   <option value="THPT">Sau đại học</option>
                   <option value="THPT">Học tiếng</option>
                   <option value="THPT">Đào tạo nghề</option>
                </select>
             </div>
          </div>
       </div>
       <div class="col-md-12">
          <div class="form-group">
             <div class="form-icon">
                <i class="far fa-school"></i>
                <select class="select" name="service">
                   <option value="">Bạn dự kiến học năm nào *</option>
                   <option value="THPT">2025</option>
                   <option value="THPT">2026</option>
                   <option value="THPT">2027</option>
                   <option value="THPT">2028</option>
                   <option value="THPT">2029</option>
                   <option value="THPT">2030</option>
                </select>
             </div>
          </div>
       </div>
       <div class="col-md-12">
          <div class="form-group">
             <div class="form-icon">
                <i class="far fa-note"></i>
                <textarea name="" class="form-control" id="" cols="30" rows="10" placeholder="Ghi chú"></textarea>
             </div>
          </div>
       </div>
         <div class="col-md-12 mt-2">
            <button type="submit" class="theme-btn"><span class="loader ml-15 spin-icon"></span> Gửi yêu cầu</button>
         </div>
      </div>
   </form>
   <script>
      $('#commentform').validate({
               rules: {
                  "name": {
                     required: true,
                  },
                  "phone": {
                     required: true,
                     minlength: 10,
                     digits: true,
                  }
               },
               messages: {
                  "name": {
                     required: "Tên bạn là gì?",
                  },
                  "phone": {
                     required: "Nhập sdt liên hệ",
                     digits:"Nhập đúng định dạng số điện thoại",
                     minlength:"Nhập tối thiểu 10 số"
                  }
               },
            submitHandler: function(form) {
               $(".spin-icon").css("display", "block");
               $.ajax({
                url: "https://script.google.com/macros/s/AKfycbyzVnC9pnnBRgBxGkLCpFVIT4bf73Gp__7kNONNhXGFOJidpO0MlkhmZPtTLcPpd8OJMA/exec",
                type: "post",
                data: $("#commentform").serializeArray(),
                success: function () {
                   $(".spin-icon").css("display", "none");
                  jQuery.notify("Thành công! Chúng tôi sẽ sớm liên hệ", "success");
                },
                error: function () {
                  jQuery.notify("Gửi thông tin thất bại", "error");
                }
             });
            }
            });
   </script>
</div>