<?php
function renderCard($data) {
    $price = number_format(rand(1999, 29999) / 100, 2);

    $tags = isset($data['tags']) ? explode(', ', $data['tags']) : [];
    ?>
    <div class="bg-card rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition flex flex-col h-full">
        <img src="https://picsum.photos/400/300?random=<?php echo rand(1, 1000); ?>" alt="<?php echo $data['title']; ?>" class="w-full h-48 object-cover">
        <div class="p-4 flex flex-col flex-grow">
            <?php if (!empty($tags)): ?>
                <div class="mt-2 flex gap-2 overflow-x-auto scrollbar-hide">
                    <?php foreach ($tags as $tag): ?>
                        <span class="text-xs bg-muted text-muted-foreground px-3 py-1 rounded-full whitespace-nowrap">
                            <?php echo htmlspecialchars($tag); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <h3 class="text-lg font-semibold mt-3"><?php echo $data['title']; ?></h3>
            
            <p class="text-accent mt-1 flex-grow"><?php echo $data['description']; ?></p>
        </div>
        <div class="p-4 mt-auto flex items-center justify-between">
            <span class="text-primary font-semibold"><?php echo "$" . $price; ?></span>
            <div class="flex items-center">
                <span class="text-chart-4"><?php echo $data['rating']; ?></span>
                <span class="text-chart-4 ml-1"><?php echo generateStars($data['rating']); ?></span>
            </div>
        </div>
    </div>
    <?php
}