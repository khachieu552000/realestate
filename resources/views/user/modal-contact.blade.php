<div class="modal fade" id="modal-contact" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Yêu cầu liên hệ</h3>
        </div>
        <form role="form" method="post" action="{{ route('customer-contact') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Họ tên <span style="color: red">*</span></label>
                    <input class="form-control" name="name" id="" require>
                </div>
                <div class="form-group">
                    <label for="">Điện thoại<span style="color: red">*</span></label>
                    <input class="form-control" name="phone" id="" require>
                </div>
                <div class="form-group">
                    <label for="">Email<span style="color: red">*</span></label>
                    <input class="form-control" name="email" id="" require>
                </div>
                <div class="form-group">
                    <label for="">Lời nhắn <span style="color: red">*</span></label>
                    <textarea class="form-control" name="message" id="" rows="5">Tôi quan tâm đến bất động sản này.</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">Huỷ</a>
                <input type="submit" class="btn btn-primary" value="Gửi">
            </div>
        </form>
      </div>

    </div>
  </div>
