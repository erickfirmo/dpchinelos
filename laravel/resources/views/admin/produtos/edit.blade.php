@extends('admin.layouts.admin')
@section('title', 'Editar')
@section('description', $produto->nome)
@section('content')


<div class="container-fluid"> 
  <div class="row">
    <div class="col-12">
      @include('admin.partials._alert')

      <div id="card" class="card">

        <div class="card-header">
          <h3 class="card-title">Editar Produto</h3>
        </div>
            <!-- /.card-header -->


        <div class="card-body">

          
          <div class="box box-danger">
            <form id="product-save-form" action="{{ route('admin.produtos.update', $produto->id)}}" method="POST">
            {{method_field('PUT')}}

              <div class="row">
                <div class="col-md-8">

                <div class="form-group">
                      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                      <label>Nome do Produto</label>
                      <input value="{{ $produto->nome }}" name="nome" type="text" class="form-control" style="width: 100%;">
                  </div>

                  <div class="form-group">
                    <label>Categoria</label>
                    <select name="categoria_id" class="form-control select2" style="width: 100%;">
                      <option disabled> -- </option>
                      @foreach($categorias as $key => $categoria)
                        <option value='{{ $key }}' 
                        @if($key == $produto->categorias->id)
                          selected="selected"
                        @endif
                        >{{ $categoria }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select name="status_id" class="form-control select2" style="width: 100%;">
                      @foreach($status as $key => $status)
                        <option value='{{ $key }}' 
                        @if($key == $produto->status->id)
                          selected="selected"
                        @endif
                        >{{ $status }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                      <label>Unidades</label>
                      <input value="{{ $produto->unidades }}" name="quantidade" type="number" min="0" class="form-control" style="width: 100%;">
                  </div>

                  <div class="form-group">
                      <label>Preço</label>
                      <input data-thousands="" data-decimal="." maxlength="9" value="{{ $produto->preco }}" name="preco" type="text" class="form-control mask-real" style="width: 100%;">
                  </div>

                  <div class="form-group">
                      <label>Descrição</label>
                      <textarea name="descricao" class="form-control" style="width:100%;">{{ $produto->descricao }}</textarea>
                  </div>

                <!-- fim col 1-->
                </div>

                <div class="col-md-4">
                  <div class="box-image-product">
                    @foreach($imagens_do_produto as $imagem_do_produto)
                      @foreach($imagens as $key => $imagem)
                        @if($imagem->id == $imagem_do_produto)
                        <img src='{{ asset("storage/images/{$imagem->url}") }}' alt='#' class="img-fluid box-main-image">
                        @endif
                      @endforeach
                    @endforeach
                
                  </div>
                  
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Adicionar imagem</button>
                  


                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog model-box">
                      <!-- Modal content-->
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title">Adicionar Imagem do Produto
                          </h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <form action="{{ route('admin.imagens.store') }}" method="POST" enctype="multipart/form-data">

                          <div class="modal-body">
                            <div class="col-md-12">
                              <div class="row">
                                <input type="file" name="file[]" multiple>&nbsp;
                              </div>
                              <br>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="row box-galery">
                              <select class="image-picker show-html">
                                @foreach($imagens as $key => $imagem)
                                <option data-img-src='{{ asset("storage/images/{$imagem->url}") }}' data-img-class="" data-img-alt="Page {{$imagem->id}}" value="{{$imagem->id}}"> Page {{$imagem->id}}} </option>
                                @endforeach
                                </select>
                              
                              <!--<div class="row ">
                                @foreach($imagens as $imagem)
                                <div class="col-md-2 col-sm-2 col-4 box-thumbnail">
                                  <img src='{{ asset("storage/images/{$imagem->url}") }}' alt='{{ $imagem->nome }}' class="img-fluid thumbnail-galery">
                                </div>
                                @endforeach
                              </div>-->

                            </div>
                          </div>
                          
                          <div class="modal-footer">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            
                            <button type="submit" class="btn btn-success">Salvar Imagens</button>
                                
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          </div>
                        </form>


                        

                        
                        
                      </div> 
                    </div>
                  </div>
                  <!-- fim modal -->
                  
                  
                  
                </div>
                <!--Fim col 2-->


              </div>
            </form>
          </div>



            <br>

                <div class="row">
                  <div class="col-md-12">
                  
                    <button id="product-save-button" type="submit" class="btn btn-primary r-button">Salvar</button>

                    <a href="{{ url('admin/produtos/') }}">
                    <button type="button" class="btn btn-secondary r-button">Cancelar</button>
                    </a>

                    <form id="product-exclude-form" action="{{ route('admin.produtos.destroy', $produto->id) }}" method="POST">
                    {{method_field('DELETE')}}
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                    </form>
                    <button id="product-exclude-button" type="submit" class="btn btn-danger button-table">Excluir</button>





                  </div>
                </div>


          
        <!--- fim card -->
        </div>


        
      </div>
    <!-- fim col -->
    </div>
  <!-- fim row -->
  </div>
<!-- fim container -->
</div>



@endsection
