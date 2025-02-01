<?php

use Metin2Register\Model\Translator;
?>
<footer class="text-gray-800 dark:text-gray-100 py-8 mt-8">
    <div class="text-center">
        <p>&copy; <?= date('Y'); ?> <?= getenv('WEBSITE_TITLE'); ?>, <?= Translator::translate('All rights reserved'); ?>.<br><small><?= Translator::translate('Developed with &hearts; by'); ?> <a href="https://github.com/ZeroCrazy" target="_blank">ZeroCrazy</a></small></p>
        <div class="mt-4">
            <div class="flex justify-center space-x-4 pt-6">
                <a href="https://www.elitepvpers.com/forum/members/8637411-zerocrazy_dev.html" aria-label="" target="_blank"><img src="https://i.imgur.com/NPNNqfD.png" alt="Elitepvpers" class="h-12 mx-2 filter contrast-50 hover:drop-shadow-[0px_0px_2px_rgba(0,0,0,0.65)] transition-all duration-300"></a>
                <a href="https://metin2.dev/profile/47534-zerocrazyv2/" aria-label="" target="_blank"><img src="https://i.imgur.com/4udmcoR.png" alt="Metin2Dev" class="h-12 mx-2 filter contrast-50 hover:drop-shadow-[0px_0px_2px_rgba(0,0,0,0.65)] transition-all duration-300"></a>
                <a href="https://www.inforge.net/forum/members/zerocrazy.295842/" aria-label="" target="_blank"><img src="https://i.imgur.com/PksPM44.png" alt="Inforge" class="h-12 mx-2 filter contrast-50 hover:drop-shadow-[0px_0px_2px_rgba(0,0,0,0.65)] transition-all duration-300"></a>
                <a href="https://codetech.es" aria-label="" target="_blank"><img src="https://i.imgur.com/AEjsAj3.png" alt="Codetech" class="h-12 mx-2 filter contrast-50 hover:drop-shadow-[0px_0px_2px_rgba(0,0,0,0.65)] transition-all duration-300"></a>
                <a href="https://metin2zone.net/index.php?/profile/1061-zerocrazy/" aria-label="" target="_blank"><img src="https://i.imgur.com/03wkpMn.png" alt="Metin2Zone" class="h-12 mx-2 filter contrast-50 hover:drop-shadow-[0px_0px_2px_rgba(0,0,0,0.65)] transition-all duration-300"></a>
            </div>
        </div>
    </div>
</footer>