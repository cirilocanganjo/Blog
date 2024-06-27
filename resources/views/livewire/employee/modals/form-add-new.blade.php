
<div wire:ignore.self class="modal fade" data-backdrop='static' id="form-add-new" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">Adicionar Notícia</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

            <form wire:submit='save'>

                <div class="form-group">
                    <label for="">Título</label>
                    <input class="form-control" type="text" wire:model="title">
                    @error('title') <span class="text-danger"> {{$message}}</span> @enderror
                </div>


                <div class="form-group">
                    <label for="">Conteúdo</label>
                    <textarea wire:model="content" class="form-control" ></textarea>
                    @error('content') <span class="text-danger"> {{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="">Foto</label>
                    <input wire:model="cover_photo" class="form-control" type="file">
                </div>

                <div class="form-group">
                    <label for="">Fonte da Notícia</label>
                    <input wire:model="font" class="form-control" type="text">
                    @error('font') <span class="text-danger"> {{$message}}</span> @enderror
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
