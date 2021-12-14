<!-- Scripts -->
<script src="<?php echo e(asset('js/editorSearch.js')); ?>" defer></script>


<?php
    use Illuminate\Support\Facades\DB;
?>



<?php $__env->startSection('content'); ?>
<div class="container pt-5" >
    <div  class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <form class="form" action="<?php echo e(route('update.revista', $revista->id )); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <h3 class="text-center">Atualizando Revista <?php echo e($revista->tituloRevista); ?><nome-aqui> </h3>
                    <?php
                        if(isset($_GET['err'])){
                            echo '<h6 class="text-center" id="obrigatorio"><small>Erro ao atualizar revista!</small></h6>';
                        }
                    ?>
                    <div class="form-group mb-2">
                        <label for="titulo" class="ms-3" m>Título<span id="obrigatorio">*</span></label><br>
                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="editor" class="ms-3">Editor<span id="obrigatorio">*</span></label><br>
                        <input type="text" name="editor_id" id="editor_id" hidden>
                        <input type="text" name="editor" id="editor_input" class="form-control" placeholder="" onkeyup="searchEditor(this.value)" autocomplete="off" required>

                        <ul class="list-group ms-4 me-4 col col-11"  id="editor">
                    </div>
                    <div class="form-group mb-2">
                        <label for="issn" class="ms-3">ISSN<span id="obrigatorio">*</span></label><br>
                        <input type="text" name="issn" id="issn" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="limite" class="ms-3">Limite de Artigos<span id="obrigatorio">*</span></label><br>
                        <input type="text" name="limite" id="limite" class="form-control" required>
                    </div>
                    <div class="d-flex">
                        <div class="form-group mb-2 col-5 me-5">
                            <label for="periodicidade" class="ms-3">Periodicidade<span id="obrigatorio">*</span></label><br>
                            <select class="form-control" name="periodicidades" id="periodicidades">
                            <option value="" disabled>-</option>
                            <?php
                                  $periodicidades = DB::table('periodicidades')->get();
                                  foreach($periodicidades as $p){
                                      echo '<option value='.$p->id.'>'.$p->descricaoPeriodicidade.'</option>';
                                  }
                            ?>
                        </select>
                        </div>
                        <div class="form-group mb-2 col-6 ">
                            <label for="areas" class="ms-3">Áreas</label><br>

                            <select class="form-control" name="areas" id="areas">
                                <option value="" disabled>-</option>
                                <?php
                                    $areas = DB::table('areas')->get();
                                    foreach($areas as $area){
                                        echo '<option value='.$area->id.'>'.$area->descricaoArea.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group pt-2 align-self-start text-start">
                            <input type="submit" name="submit" class="btn btn-success btn-md col-6" style="color:white;" value="Finalizar">
                        </div>
                        <div class="col form-group pt-2 align-self-end text-end">
                            <a href="<?php echo e(route('list.revista.mgmt')); ?>" name="cancel" style="color:red; text-decoration:none;">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('titulo').value = "<?php echo e($revista->tituloRevista); ?>";
    document.getElementById('editor').value = "<?php echo e($revista->editor->user->name); ?>";
    document.getElementById('issn').value = "<?php echo e($revista->ISSNRevista); ?>";
    document.getElementById('limite').value = "<?php echo e($revista->limiteArtigo); ?>";
    document.getElementById('periodicidade').value = "<?php echo e($revista->periodicidade->id); ?>";
    document.getElementById('areas').value = "<?php echo e($revista->area_id); ?>";
</script>

<?php if (isset($component)) { $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Footer::class, []); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf)): ?>
<?php $component = $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf; ?>
<?php unset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\rp\rp4\resources\views/revista\edit.blade.php ENDPATH**/ ?>