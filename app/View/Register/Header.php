<?php

use Metin2Register\Application;
use Metin2Register\Model\Translator;

?>
 <?= Application::getView('Register/Page/Translator.php'); ?>

 <div class="flex min-h-full flex-col justify-center py-12 px-8">
     <header class="sm:mx-auto sm:w-full sm:max-w-md">
         <h1 class="mt-6 text-center text-2xl/9 font-bold tracking-tight text-gray-900 dark:text-gray-100"><?= getenv('WEBSITE_TITLE'); ?></h1>
         <span class="block text-center text-gray-500 dark:text-gray-300 italic text-sm"><?= Translator::translate('Register account'); ?></span>
     </header>
     <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[800px]">
         <div class="sm:rounded-lg bg-orange-200 p-4 shadow">
             <div class="flex">
                 <div class="shrink-0">
                     <svg class="size-5 text-orange-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                         data-slot="icon">
                         <path fill-rule="evenodd"
                             d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z"
                             clip-rule="evenodd"></path>
                     </svg>
                 </div>
                 <div class="ml-3 flex-1 md:flex md:justify-between">
                     <p class="text-sm text-orange-700"><?= Translator::translate('It is a temporarily enabled registry.'); ?></p>
                 </div>
             </div>
         </div>
     </div>

 <script>
     const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
     if (prefersDarkScheme) {
         document.body.classList.add("dark");
     }
 </script>