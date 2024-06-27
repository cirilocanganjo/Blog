<div wire:ignore.self class="modal fade" data-backdrop='static' id="form-employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase">Dados do Funcionário</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
        
        <form wire:submit='saveEmployee'>

                <div class="col-md-12 d-flex align-items-start">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label" >Nome</label>
                            <input wire:model='name' class="form-control" placeholder="Digite o nome" />
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                
                           
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label" >Telefone</label>
                            <input wire:model='phone' placeholder="Digite o número de telefone" class="form-control" type="tel" />
                            @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        
                    <div class="form-group">
                        <label for="" class="form-label">Cargo</label>
                        <select wire:model='position' class="form-control" >
                                <option >-Selecionar-</option>
                                <option value="Director administrativo">Director administrativo</option>
                                <option value="Chefe de limpeza">Chefe de limpeza</option>
                                <option value="Segurança">Segurança</option>
                                <option value="Redator">Redator</option>
                                <option value="Recepcionista">Recepcionista</option>                           

                        </select> 
                        @error('position') <span class="text-danger">{{$message}}</span> @enderror                  
                    </div>

                    </div>

                    <div class="col-md-4">

                    <div class="form-group">
                        <label for="" class="form-label">Cidade</label>
                     <input wire:model='city' placeholder="Digite a cidade" class="form-control" type="text" />
                     @error('city') <span class="text-danger">{{$message}}</span> @enderror 
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Data de nascimento</label>
                        <input wire:model='birthday' class="form-control" type="date" />
                        @error('birthday') <span class="text-danger">{{$message}}</span> @enderror 
                    </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="" class="form-label">Bairro</label>
                            <input wire:model='neighborhood' placeholder="Digite o bairro" class="form-control" type="text" />
                            @error('neighborhood') <span class="text-danger">{{$message}}</span> @enderror 
                        </div> 

                        <div class="form-group">
                        <label for="" class="form-label">Rua</label>
                        <input wire:model='street' placeholder="Digite o bairro" class="form-control" type="text" />
                        @error('street') <span class="text-danger">{{$message}}</span> @enderror
                        </div>


                    </div>

                                

                    
                </div>                                 


            </div>
        
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        
        </form>

    </div>
</div>
</div>