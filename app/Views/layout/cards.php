<?php
function renderCard($data) {
    ?>
    <div class="bg-card rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition">
        <img src="<?php echo $data['image']; ?>" alt="<?php echo $data['title']; ?>" class="w-full h-48 object-cover">
        <div class="p-4">
            <span class="bg-destructive text-destructive-foreground text-sm px-2 py-1 rounded"><?php echo $data['badge']; ?></span>
            <h3 class="text-lg font-semibold mt-2"><?php echo $data['title']; ?></h3>
            <p class="text-accent mt-1"><?php echo $data['description']; ?></p>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-primary font-semibold"><?php echo $data['price']; ?></span>
                <div class="flex items-center">
                    <span class="text-chart-4"><?php echo $data['rating']; ?></span>
                    <span class="text-chart-4 ml-1"><?php echo generateStars($data['rating']); ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>