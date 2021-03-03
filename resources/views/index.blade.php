@extends('layouts.app')

@section('content')

<div class="content">

  {{-- Apresentação do sistema --}}
  <div class="row justify-content-center curved" style="margin-bottom:-5px">
    <div class="col-sm-11 centralizado" >
      <div class="destaques">
        <h4>Destaques</h4>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators" @if(count($proximosEventos) <= 1) style="display: none;"@endif>
        @if (count($proximosEventos) > 0)
          @foreach ($proximosEventos as $i => $evento) 
            @if ($i == 0)
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active"></li>
            @else
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
            @endif
          @endforeach
        @else
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        @endif
        </ol>
        <div class="carousel-inner">
          @if (count($proximosEventos) > 0)
              @foreach ($proximosEventos as $i => $evento) 
                @if ($i == 0)
                  <div class="carousel-item active">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-7 evento-image">
                          @if ($evento->fotoEvento != null) 
                            <img src="{{ asset('storage/eventos/'.$evento->id.'/logo.png') }}" class="d-block w-100" alt="..." style="height: 450px;">
                          @else
                            <img src="{{ asset('img/colorscheme.png') }}" class="d-block w-100" alt="..." style="height: 450px;">
                          @endif
                        </div>
                        <div class="col-sm-5 evento-atual">
                          <div class="container descricao-evento">
                            <div class="row">
                              <div class="col-sm-12" style="text-align: center;">
                                @auth
                                  <a href="{{route('evento.visualizar',['id'=>$evento->id])}}" style="color: black;"><h5 class="acessibilidade">{{$evento->nome}}</h5></a>    
                                @else  
                                  <a href="{{route('evento.visualizarNaoLogado',['id'=>$evento->id])}}" style="color: black;"><h5 class="acessibilidade">{{$evento->nome}}</h5></a>
                                @endauth
                              </div>
                            </div>
                            <div class="row acessibilidade" style="text-align: justify; font-size: 13px;">
                              <div class="col-sm-12">
                                {{$evento->descricao}}
                              </div>
                            </div>
                            <div class="row" style="color:white;">
                              <div class="col-sm-6">
                                <a class="btn cor-aleatoria acessibilidade" style="pointer-events: none; margin-top: 10px; margin-bottom: 15px; width: 100%; ">#{{$evento->tipo}}</a>
                              </div>
                              <div class="col-sm-6">
                                @if ($evento->recolhimento == "pago")
                                  <a class="btn pago acessibilidade" style="pointer-events: none; margin-top: 10px; margin-bottom: 15px; width: 100%;">Pago</a>
                                @else
                                  <a class="btn gratuito acessibilidade" style="pointer-events: none; margin-top: 10px; margin-bottom: 15px; width: 100%;">Gratuito</a>
                                @endif
                              </div>
                            </div>
                            <div class="row data-horario">
                              <div class="col-sm-6">
                                <img src="{{ asset('/img/icons/calendar.png') }}" alt="" width="23px" height="auto"> <span class="acessibilidade">{{date('d/m/Y',strtotime($evento->dataInicio))}}</span>
                              </div>
                              <div class="col-sm-6">
                                {{-- <img class="clock" src="{{ asset('/img/icons/clock.png') }}" alt="" width="25px" height="auto"> <span class="acessibilidade"> Colocar a hora aqui </span> --}}
                              </div>
                            </div>
                            <div class="row location-pointer">
                              <div class="col-sm-12">
                                <img src="{{ asset('/img/icons/location_pointer.png') }}" alt="" width="20px" height="auto"> <span class="acessibilidade">{{$evento->endereco->rua}}, {{$evento->endereco->numero}}-{{$evento->endereco->cidade}}/{{$evento->endereco->uf}}.</span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                @if ($evento->formEvento->modinscricao == true)
                                  <a href="{{route('inscricao.create', ['id' => $evento->id])}}"><button class="btn botao-inscricao acessibilidade" style="color: white; margin-top: 10px; margin-bottom: 15px; margin-right: 10px;">Faça a sua inscrição</button></a>
                                @endif
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @else
                  <div class="carousel-item">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-7 evento-image">
                          @if ($evento->fotoEvento != null) 
                            <img src="{{ asset('storage/eventos/'.$evento->id.'/logo.png') }}" class="d-block w-100" alt="..." style="height: 450px;">
                          @else
                            <img src="{{ asset('img/colorscheme.png') }}" class="d-block w-100" alt="..." style="height: 450px;">
                          @endif
                        </div>
                        <div class="col-sm-5 evento-atual" >
                          <div class="container descricao-evento">
                            <div class="row">
                              <div class="col-sm-12" style="text-align: center;">
                                <a href="{{route('evento.visualizar',['id'=>$evento->id])}}" style="color: black;"><h5 class="acessibilidade">{{$evento->nome}}</h5></a>
                              </div>
                            </div>
                            <div class="row" style="text-align: justify;">
                              <div class="col-sm-12 acessibilidade" style="font-size: 13px;">
                                {{$evento->descricao}}
                              </div>
                            </div>
                            <div class="row" style="color:white;">
                              <div class="col-sm-6">
                                <a class="btn cor-aleatoria acessibilidade" style="pointer-events: none; margin-top: 10px; margin-bottom: 15px; width: 100%;">#{{$evento->tipo}}</a>
                              </div>
                              <div class="col-sm-6">
                                @if ($evento->recolhimento == "pago")
                                  <a class="btn pago acessibilidade" style="pointer-events: none; margin-top: 10px; margin-bottom: 15px; width: 100%;">Pago</a>
                                @else
                                  <a class="btn gratuito acessibilidade" style="pointer-events: none; margin-top: 10px; margin-bottom: 15px; width: 100%;">Gratuito</a>
                                @endif
                              </div>
                            </div>
                            <div class="row data-horario">
                              <div class="col-sm-4">
                                <img src="{{ asset('/img/icons/calendar.png') }}" alt="" width="23px" height="auto"> <span class="acessibilidade">{{date('d/m/Y',strtotime($evento->dataInicio))}}</span>
                              </div>
                              <div class="col-sm-8">
                                <img class="clock" src="{{ asset('/img/icons/clock.png') }}" alt="" width="25px" height="auto"> <span class="acessibilidade"> Colocar a hora aqui </span>
                              </div>
                            </div>
                            <div class="row location-pointer">
                              <div class="col-sm-12">
                                <img src="{{ asset('/img/icons/location_pointer.png') }}" alt="" width="20px" height="auto"> <span class="acessibilidade">{{$evento->endereco->rua}}, {{$evento->endereco->numero}}-{{$evento->endereco->cidade}}/{{$evento->endereco->uf}}.</span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                @if ($evento->formEvento->modinscricao == true)
                                  <a href="{{route('inscricao.create', ['id' => $evento->id])}}"><button id="btn-inscrever-{{$evento->id}}" class="btn botao-inscricao acessibilidade" style="color: white; margin-top: 10px; margin-bottom: 15px; margin-right: 10px;">Faça a sua inscrição</button></a>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              @endforeach
          @else
            <div class="carousel-item active">
              <div class="container">
                <div class="row">
                  <div class="col-sm-12 nenhum-evento">
                    <div style="position: relative; top: 130px;">
                      Nenhum evento acontecendo atualmente
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
        @if (count($eventos) > 1)
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        @endif
      </div>
    </div>
  </div>

  <div class="row justify-content-center" style="margin-bottom:5%">
    <div class="col-sm-12" style="padding:0">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#114048ff"
        fill-opacity="1" d="M0,288L80,261.3C160,235,320,181,480,176C640,171,800,213,960,
        218.7C1120,224,1280,192,1360,176L1440,160L1440,0L1360,0C1280,0,1120,0,960,0C800,
        0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
      </svg>
    </div>
  </div>

  @if(count($proximosEventos) > 0)

    <div class="barra-horizontal proximos-eventos">
      <h2>Proximos eventos</h2>
      <div class="conteudo-inferior">
        <div class="wrapper-barra-horizontal">
          <div class="scroll-horizontal">
            <div class="cards-wrapper">
              @foreach($proximosEventos as $evento)
                <div class="card acessibilidade" style="width: 13rem;">
                  @if ($evento->fotoEvento != null) 
                    <img class="card-img-top" src="{{ asset('storage/eventos/'.$evento->id.'/logo.png') }}" alt="Card image cap">
                  @else
                    <img class="card-img-top" src="{{ asset('img/colorscheme.png') }}" alt="Card image cap">
                  @endif
                  <div class="card-body">
                    @auth
                      <a href="{{route('evento.visualizar',['id'=>$evento->id])}}" style="color: black;">
                        <h6 class="card-title acessibilidade">{{$evento->nome}}</h6>
                      </a>
                    @else
                      <a href="{{route('evento.visualizarNaoLogado',['id'=>$evento->id])}}" style="color: black;">
                        <h6 class="card-title acessibilidade">{{$evento->nome}}</h6>
                      </a>
                    @endauth
                    <br> 
                    <div class="container" style="position: relative; top: -25px;">
                      <div class="tags-a row" style="position: relative; left: -15px;">
                        <div class="col-sm-8">
                          <a class="btn cor-aleatoria" style="pointer-events: none; width:110px;">#{{$evento->tipo}}</a>
                        </div>
                        <div class="col-sm-4">
                          @if ($evento->recolhimento == "pago")
                            <a class="btn pago" style="pointer-events: none; width: 50px; ">Pago</a>
                          @else
                            <a class="btn gratuito" style="pointer-events: none; width: 70px;">Gratuito</a>
                          @endif
                        </div>
                      </div>
                      <div class="row data-horario" style="margin-top: -20px; margin-bottom: -10px;">
                        <div class="col-sm-6">
                          <img src="{{ asset('/img/icons/calendar.png') }}" alt=""> 
                          <span>
                            {{date('d/m/Y',strtotime($evento->dataInicio))}}
                          </span> 
                        </div>
                        <div class="col-sm-6">
                          {{-- <img src="{{ asset('/img/icons/clock.png') }}" alt=""> 
                          <span> 
                            Horario 
                          </span> --}}
                        </div>
                      </div>
                      <div class="row location-pointer-card">
                        <div class="col-sm-1">
                          <img src="{{ asset('/img/icons/location_pointer.png') }}" alt="" width="20px" height="auto"> 
                        </div>
                        <div class="col-sm-11">
                          <span> 
                            {{$evento->endereco->rua}}, {{$evento->endereco->numero}}-{{$evento->endereco->cidade}}/{{$evento->endereco->uf}}.
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="conteudo-superior">
        
        <a class="scroll-horizontal-prev-icon">
          <img src="{{asset('/img/icons/previos.png')}}" alt="">
        </a>
        <a class="scroll-horizontal-next-icon">
          <img src="{{asset('/img/icons/next.png')}}" alt="">
        </a>
      </div>
    </div>

    {{-- <div class="barra-horizontal proximos-eventos" style="top: -150px;">
      <h2>Tipos de Eventos</h2>
      <div class="conteudo-inferior">
        <div class="wrapper-barra-horizontal">
          <div class="scroll-horizontal">
            <div class="circular-wrapper">
              @foreach($tipos as $tipo)
                <div class="tipo-evento-circular cor-aleatoria">
                  <span>
                    #{{$tipo->tipo}}
                  </span>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="conteudo-superior">
        
        <a class="scroll-horizontal-prev-icon">
          <img src="{{asset('/img/icons/previos.png')}}" alt="">
        </a>
        <a class="scroll-horizontal-next-icon">
          <img src="{{asset('/img/icons/next.png')}}" alt="">
        </a>
      </div>
    </div>

    <div class="barra-horizontal proximos-eventos">
      <h2>Concursos</h2>
      <div class="conteudo-inferior">
        <div class="wrapper-barra-horizontal">
          <div class="scroll-horizontal">
            <div class="cards-wrapper">
              @foreach($eventos as $evento)
                <div class="card" style="width: 13rem;">
                  @if ($evento->fotoEvento != null) 
                    <img class="card-img-top" src="{{ asset('storage/eventos/'.$evento->id.'/logo.png') }}" alt="Card image cap">
                  @else
                    <img class="card-img-top" src="{{ asset('img/colorscheme.png') }}" alt="Card image cap">
                  @endif
                  <div class="card-body">
                    <a href="{{route('evento.visualizar',['id'=>$evento->id])}}" style="color: black;">
                      <h6 class="card-title">{{$evento->nome}}</h6>
                    </a>
                    <br> 
                    <div class="container" style="position: relative; top: -25px;">
                      <div class="tags-a row" style="position: relative; left: -15px;">
                        <div class="col-sm-8">
                          <a class="btn cor-aleatoria" style="pointer-events: none; width:110px;">#{{$evento->tipo}}</a>
                        </div>
                        <div class="col-sm-4">
                          @if ($evento->recolhimento == "pago")
                            <a class="btn pago" style="pointer-events: none; width: 50px; ">Pago</a>
                          @else
                            <a class="btn gratuito" style="pointer-events: none; width: 70px;">Gratuito</a>
                          @endif
                        </div>
                      </div>
                      <div class="row data-horario">
                        <div class="col-sm-6">
                          <img src="{{ asset('/img/icons/calendar.png') }}" alt=""> 
                          <span>
                            {{date('d/m/Y',strtotime($evento->dataInicio))}}
                          </span> 
                        </div>
                        <div class="col-sm-6">
                          <img src="{{ asset('/img/icons/clock.png') }}" alt=""> 
                          <span> 
                            Horario 
                          </span>
                        </div>
                      </div>
                      <div class="row location-pointer-card">
                        <div class="col-sm-1">
                          <img src="{{ asset('/img/icons/location_pointer.png') }}" alt="" width="20px" height="auto"> 
                        </div>
                        <div class="col-sm-11">
                          <span> 
                            {{$evento->endereco->rua}}, {{$evento->endereco->numero}}-{{$evento->endereco->cidade}}/{{$evento->endereco->uf}}.
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="conteudo-superior">
        
        <a class="scroll-horizontal-prev-icon">
          <img src="{{asset('/img/icons/previos.png')}}" alt="">
        </a>
        <a class="scroll-horizontal-next-icon">
          <img src="{{asset('/img/icons/next.png')}}" alt="">
        </a>
      </div>
    </div>

    <div class="barra-horizontal proximos-eventos">
      <h2>Lives</h2>
      <div class="conteudo-inferior">
        <div class="wrapper-barra-horizontal">
          <div class="scroll-horizontal">
            <div class="cards-wrapper">
              @foreach($eventos as $evento)
                <div class="card" style="width: 13rem;">
                  @if ($evento->fotoEvento != null) 
                    <img class="card-img-top" src="{{ asset('storage/eventos/'.$evento->id.'/logo.png') }}" alt="Card image cap">
                  @else
                    <img class="card-img-top" src="{{ asset('img/colorscheme.png') }}" alt="Card image cap">
                  @endif
                  <div class="card-body">
                    <a href="{{route('evento.visualizar',['id'=>$evento->id])}}" style="color: black;">
                      <h6 class="card-title">{{$evento->nome}}</h6>
                    </a>
                    <br> 
                    <div class="container" style="position: relative; top: -25px;">
                      <div class="tags-a row" style="position: relative; left: -15px;">
                        <div class="col-sm-8">
                          <a class="btn cor-aleatoria" style="pointer-events: none; width:110px;">#{{$evento->tipo}}</a>
                        </div>
                        <div class="col-sm-4">
                          @if ($evento->recolhimento == "pago")
                            <a class="btn pago" style="pointer-events: none; width: 50px; ">Pago</a>
                          @else
                            <a class="btn gratuito" style="pointer-events: none; width: 70px;">Gratuito</a>
                          @endif
                        </div>
                      </div>
                      <div class="row data-horario">
                        <div class="col-sm-6">
                          <img src="{{ asset('/img/icons/calendar.png') }}" alt=""> 
                          <span>
                            {{date('d/m/Y',strtotime($evento->dataInicio))}}
                          </span> 
                        </div>
                        <div class="col-sm-6">
                          <img src="{{ asset('/img/icons/clock.png') }}" alt=""> 
                          <span> 
                            Horario 
                          </span>
                        </div>
                      </div>
                      <div class="row location-pointer-card">
                        <div class="col-sm-1">
                          <img src="{{ asset('/img/icons/location_pointer.png') }}" alt="" width="20px" height="auto"> 
                        </div>
                        <div class="col-sm-11">
                          <span> 
                            {{$evento->endereco->rua}}, {{$evento->endereco->numero}}-{{$evento->endereco->cidade}}/{{$evento->endereco->uf}}.
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="conteudo-superior">
        
        <a class="scroll-horizontal-prev-icon">
          <img src="{{asset('/img/icons/previos.png')}}" alt="">
        </a>
        <a class="scroll-horizontal-next-icon">
          <img src="{{asset('/img/icons/next.png')}}" alt="">
        </a>
      </div>
    </div> --}}

  @endif

  <div id="btn-mais-eventos" class="row justify-content-center" style="margin-bottom:-100px">
    <div class="col-sm-12">
      <button class="btn" onclick="window.location='{{route('busca.eventos')}}'">+ Ver Todos os Eventos</button>
    </div>
  </div>
</div>

{{-- Modal info --}}
<div class="modal fade bd-example-modal-lg modal-info-home" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="modalInfo" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header" style="background-color: #114048ff; color: white;">
          <div class="container">
            <div class="row justify-content-center" style="position: relative; top: 10px; left: 25px;">
              <div class="col-sm-6">
                <img src="{{asset('/img/logo_home.png')}}" alt="" width="500px" height="auto">
              </div>
            </div>
            <div id="text-modal-home" class="row justify-content-center" style="position: relative; top: 100px; left: 25px;">
              <div class="col-sm-11">
                O "sistema de gestão de eventos científicos" é uma plataforma web desenvolvida como
                software livre pela Universidade Federal do Agreste de Pernambuco que busca contribuir
                com instituições acadêmicas públicas ou privadas que necessitem de uma ferramenta
                para viabilizar a gestão de todo o conjunto de atividades ligadas a um evento científico,
                sejam elas inscrições para participação ou de trabalhos, avaliação de trabalhos,
                certificação, entre outros.
              </div>
            </div>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <div class="modal-body">
          <div class="row justify-content-center" style="position: relative; bottom: 20px; width: 102.78%; left: -1px;">
            <div class="col-sm-12" style="padding:0px;">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#114048ff"
                fill-opacity="1" d="M0,288L80,261.3C160,235,320,181,480,176C640,171,800,213,960,
                218.7C1120,224,1280,192,1360,176L1440,160L1440,0L1360,0C1280,0,1120,0,960,0C800,
                0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
              </svg>
            </div>
          </div>
          <div class="row justify-content-center modulos" style="padding:0 7% 0 7%" >
            <div class="col-sm-4" style="position: relative; top: 150px;">
              <div class="info-modulo">
                <div class="info-modulo-head">
                  <img src="{{asset('img/icons/inscricao.svg')}}" alt="">
                  <h1>Inscrições</h1>
        
                </div>
                <div class="">
        
                  <p>Permite a inscrição de pessoas físicas,
                    jurídicas, grupos e outras modalidades nos eventos criados de
                    modo gratuito, pago ou ainda com cupons de desconto ou de gratuidade.
                    Viabiliza o pagamento por meio de boleto bancário, cartão de débito
                    ou de crédito por meio de parcerias com outras ferramentas e também
                    possui uma interface administrativa para a gestão destas inscrições
                    e valores recebidos destas inscrições.</p>
                  </div>
              </div>
            </div>
        
            <div class="col-sm-4" style="position: relative; top: 150px;">
              <div class="info-modulo">
                <div class="info-modulo-head">
                  <img src="{{asset('img/icons/documento.svg')}}" alt="">
                  <h1>Trabalhos</h1>
        
                </div>
                
                <div class="">
        
                  <p>Propicia a gestão do fluxo dos
                    trabalhos acadêmicos de diversas naturezas (resumo,
                    trabalho completo, etc) dentro de um evento, isto é,
                    a inscrição, distribuição, avaliação, classificação,
                      organização para apresentação, entre outras.</p>
                  </div>
              </div>
            </div>
            <div class="col-sm-4" style="position: relative; top: 150px;">
              <div class="info-modulo">
                <div class="info-modulo-head">
                  <img src="{{asset('img/icons/certificado.svg')}}" alt="">
                  <h1>Certificados</h1>
        
                </div>
                
                <div class="">
        
                  <p>Viabiliza a emissão de
                    todo os certificados necessários de modo rápido e
                    em tempo real. Contempla a emissão de certificados
                    para participantes, comissão organizadora, científica,
                    palestrantes, e outras naturezas de envolvimento no evento.
                      Também permite a customização inteligente de modelos de
                      certificados, logos, assinaturas, etc.</p>
                  </div>
                </div>
              </div>
            </div>
          {{-- Container Eventos Recentes --}}
          {{-- <div class="container-fluid" style="width:95%; margin-bottom:50px">
      
            <div class="col-sm-12">
              <div class="row titulo" style="margin-top:0">
                <h1>Eventos em curso</h1>
              </div>
            </div>
      
            <div class="row">
              @foreach ($eventos as $evento)
                @if($evento->publicado && $evento->deletado == false) 
                  <div class="card" style="width: 18rem;">
                      @if(isset($evento->fotoEvento))
                        <img src="{{asset('storage/eventos/'.$evento->id.'/logo.png')}}" class="card-img-top" alt="...">
                      @else
                        <img src="{{asset('img/colorscheme.png')}}" class="card-img-top" alt="...">
                      @endif
                      <div class="card-body">
                          <div class="row">
                              <div class="col-sm-12">
                                  <h4 class="card-title">
                                      <div class="row justify-content-center">
                                          <div class="col-sm-12">
                                              {{$evento->nome}}
                                              @can('isCoordenador', $evento)
                                                  <div class="btn-group dropright dropdown-options">
                                                      <a id="options" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <div onmouseout="this.children[0].src='{{ asset('/img/icons/ellipsis-v-solid.svg') }}';" onmousemove="this.children[0].src='{{ asset('/img/icons/ellipsis-v-solid-hover.svg')}}';">
                                                            <img src="{{asset('img/icons/ellipsis-v-solid.svg')}}" style="width:8px">
                                                        </div>
                                                      </a>
                                                      <div class="dropdown-menu">
                                                          <a href="{{ route('coord.detalhesEvento', ['eventoId' => $evento->id]) }}" class="dropdown-item">
                                                              <img src="{{asset('img/icons/eye-regular.svg')}}" class="icon-card" alt="">
                                                              Detalhes
                                                          </a>
                                                          <a href="{{route('evento.editar',$evento->id)}}" class="dropdown-item">
                                                              <img src="{{asset('img/icons/edit-regular.svg')}}" class="icon-card" alt="">
                                                              Editar
                                                          </a>
                                                          <form method="POST" action="{{route('evento.deletar',$evento->id)}}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="dropdown-item">
                                                                <img src="{{asset('img/icons/trash-alt-regular.svg')}}" class="icon-card" alt="">
                                                                Deletar
                                                            </button>
                                                          </form>
                                                      </div>
                                                  </div>
                                              @endcan
                                          </div>
      
                                      </div>
      
                                  </h4>
      
                              </div>
                          </div>
                          <p class="card-text">
                              <strong>Realização:</strong> {{date('d/m/Y',strtotime($evento->dataInicio))}} - {{date('d/m/Y',strtotime($evento->dataFim))}}<br>
                              <strong>Submissão:</strong> {{date('d/m/Y',strtotime($evento->inicioSubmissao))}} - {{date('d/m/Y',strtotime($evento->fimSubmissao))}}<br>
                              <strong>Revisão:</strong> {{date('d/m/Y',strtotime($evento->inicioRevisao))}} - {{date('d/m/Y',strtotime($evento->fimRevisao))}}<br>
                          </p>
                          <p>
      
                              <div class="row justify-content-center">
                                  <div class="col-sm-12">
                                      <img src="{{asset('img/icons/map-marker-alt-solid.svg')}}" alt="" style="width:15px">
                                      {{$evento->endereco->rua}}, {{$evento->endereco->numero}} - {{$evento->endereco->cidade}} / {{$evento->endereco->uf}}.
                                  </div>
                              </div>
                          </p>
                          <p>
                              <a href="{{  route('evento.visualizarNaoLogado',['id'=>$evento->id])  }}" class="visualizarEvento">Visualizar Evento</a>
                          </p>
                      </div>
      
                  </div>
                @endif
              @endforeach
            </div>
      
            <div class="row justify-content-center">
              <a class="btn btn-outline-secondary btn-lg" href="{{route('home')}}"
                style="margin-bottom:10px;" role="button">Mais Eventos</a>
      
            </div>
      
          </div> --}}
          {{-- end Container Eventos Recentes           --}}
        </div>
    </div>
  </div>
</div>

@include('componentes.footer')

{{-- Fim modal info --}}
  <!-- Modal Login-->
  {{-- <div class="modal fade bd-example-modal-lg" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="modalInfo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color: #114048ff; color: white;">
            <h5 class="modal-title" id="modalInfo">Informações</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row justify-content-center">
                <div class="titulo-login-cadastro">Login</div>
            </div>

            <div class="form-group row">

                <div class="col-md-12">
                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-12">
                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="width:100%">
                        {{ __('Login') }}
                    </button>
                    <div class="row justify-content-center">

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> --}}

  @endsection

@section('javascript')
  <script>
    $(document).ready(function(){
      $('.carousel').carousel({
        interval: false
      });

      

      // $('#modalInfo').modal('show');

      var botoes = document.getElementsByClassName('cor-aleatoria');
      for (var i = 0; i < botoes.length; i++) {
        botoes[i].style.backgroundColor = '#'+Math.floor(Math.random()*16777215).toString(16);
      }

      var barras = document.getElementsByClassName('wrapper-barra-horizontal');
      for (var i = 0; i < barras.length; i++) {
        if (window.innerWidth < barras[i].scrollWidth) {
          barras[i].parentElement.parentElement.children[2].style.display = "block"
        } else {
          barras[i].parentElement.parentElement.children[2].style.display = "none"
        }
      }

      $('.scroll-horizontal-next-icon').click(function() {
        var move = this.parentElement.parentElement.children[1].children[0].scrollLeft += 200;
        $(this).closest('.barra-horizontal')
               .children('.conteudo-inferior')
               .children('.wrapper-barra-horizontal').animate({scrollLeft: move}, 500);
      })

      $('.scroll-horizontal-prev-icon').click(function() {
        var move = this.parentElement.parentElement.children[1].children[0].scrollLeft -= 200;
        $(this).closest('.barra-horizontal')
               .children('.conteudo-inferior')
               .children('.wrapper-barra-horizontal').animate({scrollLeft: move}, 500);
      })
    });

  </script> 
@endsection
