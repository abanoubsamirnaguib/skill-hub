<div class="col-md-9">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Response Mail</h3>

        <div class="box-tools pull-right">
          <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i></a>
          <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Next"><i class="fa fa-chevron-right"></i></a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <div class="mailbox-read-info">
          <h3>Message Subject Is {{$Subject}}</h3>
          <h5>From: Skilshub@Skillshub.com
            {{-- <span class="mailbox-read-time pull-right">15 Feb. 2016 11:03 PM</span></h5> --}}
        </div>
        <!-- /.mailbox-read-info -->

        <!-- /.mailbox-controls -->
        <div class="mailbox-read-message">
          <p>Hello {{$Name}},</p>

          <p> </p>

          <p>{{$Body}}.</p>

          <p>Thanks,<br> {{$AdminName}}</p>
        </div>
        <!-- /.mailbox-read-message -->
      </div>
      <!-- /.box-footer -->
      <div class="box-footer">
        <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
        <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /. box -->
  </div>