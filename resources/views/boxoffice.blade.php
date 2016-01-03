@extends('master')
@section('content')

         <div class="box box-primary">
               <div class="box-header with-border">
                 <h3 class="box-title">Box Office Manajemens</h3>
               </div><!-- /.box-header -->
               <!-- form start -->
                 <div class="box-body">
                   <div class="form-group">
                     <label for="exampleInputEmail1">Nama Film</label>
                     <input type="text" class="form-control" id="namafilm" placeholder="Nama Film"  required>
                   </div>
                   <div class="form-group">
                     <label for="exampleInputPassword1">Link Download Film</label>
                     <input type="text" class="form-control" id="linkdownloadfilm" placeholder="Link Download Film" required>
                   </div>
                   <div class="form-group">
                     <label for="exampleInputPassword1">Kualitas</label>
                     <input type="text" class="form-control" id="kualitas" placeholder="Kualitas" required>
                   </div>
                 </div><!-- /.box-body -->
                 <div class="box-footer">
                   <button type="submit" class="btn btn-primary" id="saverecord">Save Data </button>
                   <button type="submit" class="btn btn-primary" id="updaterecord">Update Data </button>
                 </div>
                 <input type="hidden" id="id">
             </div><!-- /.box -->
             <div class="box">
               <div class="box-header">
                 <h3 class="box-title">Data Table With Full Features</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                 <table id="example1" class="table table-bordered table-striped">
                   <thead>
                     <tr>
                       <th>ID</th>
                       <th>Nama Film</th>
                       <th>Link Download Film</th>
                       <th>Kualitas</th>
                       <th>gambar</th>
                       <th> Action</th>
                     </tr>
                   </thead>
                   <tbody class="displayrecord">

                    </tbody>
                 </table>
               </div><!-- /.box-body -->
             </div><!-- /.box -->

{!!Html::script('js/jquery-1.11.1.min.js')!!}
{!!Html::script('js/jquery.min.js')!!}

<script type="text/javascript">
    $(function(){
            displaydata();
          $('body').delegate('.edit','click',function(){
                    var id = $(this).data('id');
              $.ajax({
                            url:"<?= URL::to('editdata')?>",
                            type:"POST",
                            async:false,
                            data:{
                              'id': id
                      },
                      success:function(e)
                      {
                          $('#id').val(e.id);
                          $('#namafilm').val(e.nama_film);
                          $('#linkdownloadfilm').val(e.link_download_film);
                          $('#kualitas').val(e.kualitas);
                      }
                    });
                  });
          $('body').delegate('.delete','click',function(){
                var id = $(this).data('id');
          $.ajax({
                      url:"<?= URL::to('deletedata')?>",
                      type:"POST",
                      async:false,
                      data:{
                            'id': id
                      },
                        success:function(d)
                      {
                        if(d==0){
                          alert('delete success');
                          displaydata();
                        }else {
                          alert('delete error');
                        }
                        }
                    });
              });

         $('#saverecord').click(function(){
                        var namafilm         = $('#namafilm').val();
                        var linkdownloadfilm = $('#linkdownloadfilm').val();
                        var kualitas         = $('#kualitas').val();
              $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                      });
              $.ajax({
                      url: "{!! URL::to('save')!!}",
                      type:"POST",
                      async:false,
                      data:{
                          'kode_mk'          :namafilm,
                          'linkdownloadfilm'  :linkdownloadfilm,
                          'kualitas'          : kualitas
                        },
                      success : function(re)
                      {
                       if(re==0){
                         alert('success');
                         displaydata();
                       }else {
                         alert('error');
                       }
                      }
                    });
                  });

               $('#updaterecord').click(function(){
                              var id                = $('#id').val();
                              var namafilm         = $('#namafilm').val();
                              var linkdownloadfilm = $('#linkdownloadfilm').val();
                              var kualitas         = $('#kualitas').val();
                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  }
                            });
                    $.ajax({
                            url: "{!! URL::to('update')!!}",
                            type:"POST",
                            async:false,
                            data:{
                                'id' : id,
                                'namafilm'          :namafilm,
                                'linkdownloadfilm'  :linkdownloadfilm,
                                'kualitas'          : kualitas
                              },
                            success : function(re)
                            {
                             if(re==0){
                               alert('success');
                               displaydata();
                             }else {
                               alert('error');
                             }
                            }
                          });
                        });
                     });
        function displaydata()
        {

          $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
          $.ajax({
                      url:"<?= URL::to('showdata')?>",
                      type:"post",
                      async:false,
                      data:{
                          'showrecord':1
                      },
                      success:function(s)
                    {
                      $('.displayrecord').html(s);
                    }
                    });
                  }
</script>
{!!Form::hidden('_token',csrf_token())!!}
@stop
