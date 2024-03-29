<div class="modal fade" id="modal-auction" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Vui lòng nhập đầy đủ thông tin để tham gia đấu giá</h3>
        </div>
        <form role="form" method="POST" action="" id="form-auction">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Họ tên <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="name" id="" require>
                </div>
                <div class="form-group">
                    <label for="">CMND/CCCD<span style="color: red">*</span></label>
                    <input type="number" class="form-control" name="citizen_identification" id="" require>
                </div>
                <div class="form-group">
                    <label for="">Điện thoại<span style="color: red">*</span></label>
                    <input type="number" class="form-control" name="phone" id="" require>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="address" id="" require>
                </div>
                <div class="form-group">
                    <label for="">Số tiền <span style="color: red">*</span></label>
                    <input type="number" class="form-control" name="price" id="" require>
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
