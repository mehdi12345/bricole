<div class="w-full">


    <?php if ($step === 'overview'): ?>
        <?php
if (!isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.gigs.options.steps.overview', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('l2694668587-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2694668587-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2694668587-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2694668587-0');
} else {
    $response = \Livewire\Livewire::mount('admin.gigs.options.steps.overview', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l2694668587-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif;?>


    <?php if ($step === 'pricing'): ?>
        <?php
if (!isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.gigs.options.steps.pricing', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('l2694668587-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l2694668587-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2694668587-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2694668587-1');
} else {
    $response = \Livewire\Livewire::mount('admin.gigs.options.steps.pricing', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l2694668587-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif;?>


    <?php if ($step === 'requirements'): ?>
        <?php
if (!isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.gigs.options.steps.requirements', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('l2694668587-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l2694668587-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2694668587-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2694668587-2');
} else {
    $response = \Livewire\Livewire::mount('admin.gigs.options.steps.requirements', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l2694668587-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif;?>


    <?php if ($step === 'gallery'): ?>
        <?php
if (!isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.gigs.options.steps.gallery', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('l2694668587-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l2694668587-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2694668587-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2694668587-3');
} else {
    $response = \Livewire\Livewire::mount('admin.gigs.options.steps.gallery', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l2694668587-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif;?>

</div><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/admin/gigs/options/edit.blade.php ENDPATH**/?>