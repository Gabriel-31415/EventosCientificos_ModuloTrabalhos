@extends('coordenador.detalhesEvento')

@section('menu')

    <div id="divListarCriterio" class="comissao">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="titulo-detalhes">Formulário(s) da molidade: <br> <strong> {{$modalidade->nome}}</strong> </h3>
            </div>
        </div> 
    </div>
    {{-- {{dd($modalidade->forms)}} --}}
    @foreach ($modalidade->forms as $form)
        <div class="card" style="width: 48rem;">
            <div class="card-body">
            <h5 class="card-title">{{$form->titulo}}</h5>
            
            <p class="card-text">
                
                @foreach ($form->perguntas as $pergunta)
                    <div class="card">
                        <div class="card-body">
                            <p>Pergunta: {{$pergunta->pergunta}}</p>
                            @if(!isset($pergunta->resposta->opcoes))
                                Resposta com Multipla escolha:
                            @else
                                <p>Resposta com paragrafo: {{$pergunta->resposta->resposta}}</p>
                            @endif
                        </div>
                    </div>
                    
                @endforeach
            </p>
            
            </div>
        </div>
        
    @endforeach
   

@endsection

{{-- <div class="row">
    <div class="col-md-12">                                
        <div id="coautores" class="flexContainer " >
            <div class="item card" style="order:1">
                <div class="row card-body">
                    <div class="col-sm-12">
                        <label>Pergunta</label>
                        <input type="text" syle="margin-bottom:10px"   class="form-control " name="pergunta[]" value="{{$pergunta}}" required>
                    </div>
                    <div class="col-sm-8" >
                        <label>Resposta</label>
                        <div class="row" id="row1">
                            <div class="col-md-12">
                                <input type="text" style="margin-bottom:10px"  class="form-control " name="resposta[]" required>
                            </div>                                
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tipo</label>
                            <select onchange="escolha(this.value)" name="tipo[]" class="form-control" id="FormControlSelect">
                                <option value="paragrafo">Parágrafo</option>
                                <option value="checkbox">Multipla escolha</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-sm-7">
                        <a href="#" class="delete pr-2 mr-2">
                            <i class="fas fa-trash-alt fa-2x"></i>
                        </a>
                        <a href="#" onclick="myFunction(event)">
                        <i class="fas fa-arrow-up fa-2x" id="arrow-up" style=""></i>
                        </a>
                        <a href="#" onclick="myFunction(event)">
                        <i class="fas fa-arrow-down fa-2x" id="arrow-down" style="margin-top:35px"></i>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}