@extends('site.basetemplate')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css') }}">
    <div class="jumbotron text-center">APRENDENTO LISTAGEM</div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-success" data-bind="click:addItem">Add Item</button>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Oferta</th>
                        <th>KPI</th>
                        <th>Período</th>
                        <th>Regra</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody data-bind="foreach:agenda">
                    <tr>
                        <td> <span data-bind="text:OFE_NOME"></span> </td>
                        <td> <span data-bind="text:TKI_NOME"></span> </td>
                        <td> <span data-bind="text:OFEJOB_PERIODO"></span> </td>
                        <td> <span data-bind="text:OFEJOB_REGRA"></span> </td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-pencil" data-bind="click:edit"></span>
                        </td>
                        <td class="text-center">
                            <span class="glyphicon glyphicon-trash" data-bind="click:$data.del"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
    
            <!-- Modal content-->
            <div class="modal-content" data-bind="with:modal_object">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title">Add Profile</h4>
                </div>
                <div class="modal-body form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Oferta</label>
                            <select class="form-control" data-bind="
    									options:$root.comboboxOferta,
    									optionsText:'OFE_NOME',
    									optionsValue:'OFE_ID',
    									optionsCaption:'Selecione',
    									value:OFE_ID
    								"></select>
						</div>
					</div>
					<div class="row" data-bind="with:tmpregra">
						<div class="col-md-3"><label for="">Kpi:<input type="text" name="" id="" class="form-control"></label></div>
						<div class="col-md-3"><label for="">Período<input type="text" name="" id="" class="form-control"></label></div>
						<div class="col-md-3"><label for="">Operador<input type="text" name="" id="" class="form-control"></label></div>
						<div class="col-md-3"><label for="">Regra<input type="text" name="" id="" class="form-control"></label></div>

					</div>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>KPI</th>
										<th>Período</th>
										<th>"Operador"</th>
										<th>Regra</th>
										<th colspan="2"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><span data-bind="text:KKK">Kpi</span></td>
										<td><span data-bind="text:KKK">Período</span></td>
										<td><span data-bind="text:KKK">"Operador"</span></td>
										<td><span data-bind="text:KKK">Regra</span></td>
										<td class="text-center">
											{{--  <span class="glyphicon glyphicon-pencil" data-bind="click:edit"></span>  --}}
											<i class="fas fa-pencil-alt"></i>
										</td>
										<td class="text-center">
											{{--  <span class="glyphicon glyphicon-trash" data-bind="click:$data.del"></span>  --}}
											<i class="fas fa-trash-alt"></i>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
                    <div class="row">
                        <div class="col-md-12" data-bind="foreach:$root.errosModal">
                            <p>*<span style="color:red" data-bind="text:$data"></span></p>
                        </div>
                    </div>
				</div>
                <div class="modal-footer">
                    <button class="btn btn-info" data-bind="click:save">Salvar</button>
                    <button class="btn btn-warning" data-bind="click:cancel">Cancelar</button>
                </div>
            </div>
    
        </div>
    </div>
    <!-- fim modal -->
    <script type="text/javascript">
        // mok simulado do backend 
    		var data = {
    			status: 'OK',
    			response:{
    				kpis:[
    					{
    						TKI_ID:1,
    						TKI_NOME:'Visita',
    						regras: [
    							{
    								REGR_ID:1,
    								REGR_NOME:'Maior que'
    							},
    							{
    								REGR_ID:2,
    								REGR_NOME:'Menor que'
    							},
    							{
    								REGR_ID:4,
    								REGR_NOME:'Igual á'
    							}
    						]
    					},
    					{
    						TKI_ID:2,
    						TKI_NOME:'Nf',
    						regras: [
    							{
    								REGR_ID:5,
    								REGR_NOME:'Maior que'
    							},
    							{
    								REGR_ID:6,
    								REGR_NOME:'Menor que'
    							},
    							{
    								REGR_ID:7,
    								REGR_NOME:'Igual á'
    							}
    						]
    					},
    					{
    						TKI_ID:3,
    						TKI_NOME:'OutraCoisa',
    						regras: [
    							{
    								REGR_ID:8,
    								REGR_NOME:'Maior que'
    							},
    							{
    								REGR_ID:9,
    								REGR_NOME:'Menor que'
    							},
    							{
    								REGR_ID:10,
    								REGR_NOME:'Igual á'
    							}
    						]
    					}
    				],
    				// lista temporaria de ofertas, buscar por busca viva
    				ofertas: [
    					{OFE_ID:1,OFE_NOME:'Oferta_1'},
    					{OFE_ID:2,OFE_NOME:'Oferta_2'},
    					{OFE_ID:3,OFE_NOME:'Oferta_3'}
    				],
    
    				agenda:[
    					{
    						OFE_ID: 1,
    						OFE_NOME: 'Oferta_1',
    						agenda: [
    							{
    								OFEJOB_ID: 1,
    								TKI_ID: 1,
    								REGR_ID:1,
    								TKI_NOME: 'Visita',
    								OFEJOB_PERIODO: 1,
    								OFEJOB_REGRA: '1'
    							}, 
    							{
    								OFEJOB_ID: 2,
    								TKI_ID: 2,
    								REG_ID: 3,
    								TKI_NOME: 'NF',
    								OFEJOB_PERIODO: 1,
    								OFEJOB_REGRA: '1'
    							}, 
    							{
    								OFEJOB_ID:3,
    								TKI_ID: 3,
    								REGR_ID:7,
    								TKI_NOME: 'Outra Coisa',
    								OFEJOB_PERIODO: 1,
    								OFEJOB_REGRA: '1'
    							},
    						]
    					},
    					{
    						OFE_ID: 2,
    						OFE_NOME: 'Oferta_2',
    						agenda: [
    							{
    								OFEJOB_ID: 4,
    								TKI_ID: 1,
    								REGR_ID:2,
    								TKI_NOME: 'Visita',
    								OFEJOB_PERIODO: 1,
    								OFEJOB_REGRA: '1'
    							}, 
    							{
    								OFEJOB_ID: 5,
    								TKI_ID: 2,
    								REG_ID: 3,
    								TKI_NOME: 'NF',
    								OFEJOB_PERIODO: 1,
    								OFEJOB_REGRA: '1'
    							}, 
    							{
    								OFEJOB_ID:6,
    								TKI_ID: 3,
    								REGR_ID:7,
    								TKI_NOME: 'Outra Coisa',
    								OFEJOB_PERIODO: 1,
    								OFEJOB_REGRA: '1'
    							},
    						]
    					},
    					{
    						OFE_ID: 3,
    						OFE_NOME: 'Oferta_3',
    						agenda: [
    							{
    								OFEJOB_ID: 1,
    								TKI_ID: 1,
    								REGR_ID:1,
    								TKI_NOME: 'Visita',
    								OFEJOB_PERIODO: 1,
    								OFEJOB_REGRA: '1'
    							}, 
    							{
    								OFEJOB_ID: 2,
    								TKI_ID: 2,
    								REG_ID: 3,
    								TKI_NOME: 'NF',
    								OFEJOB_PERIODO: 1,
    								OFEJOB_REGRA: '1'
    							}, 
    							{
    								OFEJOB_ID:3,
    								TKI_ID: 3,
    								REGR_ID:7,
    								TKI_NOME: 'Outra Coisa',
    								OFEJOB_PERIODO: 1,
    								OFEJOB_REGRA: '1'
    							},
    						]
    					},
    				]
    			}
    		};
    
    		function Regra(obj,refs)
    		{
    			var self = this;
    
				self.OFEJOB_ID      = ko.observable(obj.OFEJOB_ID);
    			self.TKI_ID         = ko.observable(obj.TKI_ID);
    			self.TKI_NOME       = ko.observable(obj.TKI_NOME);
    			self.REGR_ID        = ko.observable(obj.REGR_ID);
    			self.REGR_NOME      = ko.observable(obj.REGR_NOME);
     			self.OFEJOB_PERIODO = ko.observable(obj.OFEJOB_PERIODO);
				self.OFEJOB_REGRA   = ko.observable(obj.OFEJOB_PERIODO);
				self.editing = ko.observable(false);
				self.edit = function(){self.editing(true)};
				self.del = function()
				{
					refs.regras.remove(self);
				};
    		};
    
    		function OfertaAgendaJob(obj,refs)
    		{
    			var self = this;
    
    			self.original = obj||{};
    			self.OFE_ID         = ko.observable(obj.OFE_ID).extend({
    				required:{message:'O campo x é obrigatório'}
    			});
				self.OFE_NOME = ko.observable(obj.OFE_NOME);
				self.regras = ko.observableArray( ko.utils.arrayMap(obj.regras||[],function(i){ return self.makeRegra(i) }) );
    			self.makeRegra = function(tmp)
    			{
    				return new Regra(
    					tmp,{
    
    					}
    				);
    			};
    			
    
    			self.errors = ko.validation.group(self);
    			self.edit = function()
    			{
    				refs.modal_object(self);
    				refs.errosModal(null);
    				refs.openModal(true);
    			};
    			self.save = function()
    			{
    				refs.errosModal(null);
    				if(self.errors().length > 0)
    				{
    					refs.errosModal(self.errors());
    					return;
    				}
    				if(!self.checkuniq()) return;
    				var postData = JSON.parse(ko.toJSON(self));
    				console.log(postData);
    				self.updateOriginal();
    				// executar o post aqui
    				refs.openModal(false);
    				refs.modal_object(null);
    				return;
    			};
    			self.cancel = function()
    			{
    				if(!self.OFEJOB_ID())
    				{
    					refs.parent_list.remove(self);
    				}
    				refs.errosModal(null);
    				self.resetValues();
     				refs.openModal(false);
    				return;
    			};
    			self.del = function()
    			{
    				// var postData = {OFEJOB_ID:self.OFEJOB_ID()};
    				// fazer o post para deletar
    				// no callback de sucesso
    				refs.parent_list.remove(self);
    				refs.errosModal(null);
    				refs.openModal(false);
    			};
    			self.updateOriginal = function()
    			{
    				self.original = JSON.parse(ko.toJSON(self));
    			};
    			self.resetValues = function()
    			{
    				
    			};
    			self.TKI_ID.subscribe(function(val){
    				self.TKI_NOME( val
    					? refs.getNameString('comboboxKpi','TKI_ID','TKI_NOME',val)
    					: null
    				);
    			});
    			self.OFE_ID.subscribe(function(val){
    				self.OFE_NOME( val
    					? refs.getNameString('comboboxOferta','OFE_ID','OFE_NOME',val)
    					: null
    				);
    			});
    			self.checkuniq = ko.computed(function()
    			{
    				var valid = true;
    				if(self.OFE_ID() && self.TKI_ID() && !self.OFEJOB_ID())
    				{
    					var tmp = self.OFE_ID()+'|'+self.TKI_ID();
    					valid = refs.uniq().indexOf(tmp) == -1;
    					if(!valid)
    					{
    						alert('sou inválido');
    						self.OFE_ID(null);
    						self.TKI_ID(null);
    					}
    				}
    				return valid;
    			});
    		}
    
    		function ViewModel()
    		{
    			var self = this;
    			self.agenda       = ko.observableArray();
    			self.kpis         = ko.observableArray();
    			self.ofertas      = ko.observableArray(); // gambi para funcionar no exemplo
    			self.modal_object = ko.observable(null);
    			self.errosModal   = ko.observableArray(null);
    			self.openModal = function(action)
    			{
    				$("#myModal").modal(action?'show':'hide');
    			};
    			self.uniq = ko.computed(function(){
    				var tmp = [];
    				ko.utils.arrayForEach(self.agenda(), function(i){
    					if(i.OFE_ID() && i.TKI_ID() && i.OFEJOB_ID()) tmp.push(i.OFE_ID()+'|'+i.TKI_ID());
    				});
    				return tmp;
    			});
    			self.getNameString = function(propName,idProp,txtProp,id)
    			{
    				var tmp = ko.unwrap(self[propName]);
    				if(tmp.length && tmp.forEach)
    				{
    					for(var i = 0; i<tmp.length;i++){
    						if(ko.unwrap(tmp[i][idProp]) == id) return ko.unwrap(tmp[i][txtProp]);
    					}
    				}
    				return '';
    			};
    			self.makeAgenda = function(tmp)
    			{
    				return new OfertaAgendaJob(
    					tmp,{
    					modal_object  : self.modal_object,
    					agenda        : self.agenda,
    					openModal     : self.openModal,
    					getNameString : self.getNameString,
    					uniq          : self.uniq,
    					errosModal    : self.errosModal}
    				);
    			};
    			self.addItem = function()
    			{
    				var tmp = self.makeAgenda({});
    				tmp.edit();
    				self.agenda.push(tmp);
    			};
    			self.setData = function(data)
    			{
    				if(data.status == 'OK'){
    					self.agenda(
    						ko.utils.arrayMap(data.response.agenda, function(item){
    							return self.makeAgenda(item);
    						})
    					);
    					self.comboboxKpi(data.response.comboboxKpi);
    					self.comboboxOferta(data.response.ofertas);
    				}
    			};
    		}
    
    		var viewModel = new ViewModel();
    
    		$(function()
    		{
    			// viewModel.setData(data);
    			// ko.applyBindings(viewModel);
    		});
    </script>
@stop