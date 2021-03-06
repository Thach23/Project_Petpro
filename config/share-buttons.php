<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Providers
    |--------------------------------------------------------------------------
    |
    | This value specifies basic settings for share providers.
    | They include a share url, default share text, some extras.
    |
    |
    */

    'providers' => [
        'copylink' => [
            'url' => ':url',
            'extra' => [
                'hash' => 'true',
            ],
        ],
        'evernote' => [
            'url' => 'https://www.evernote.com/clip.action?url=:url&t=:title',
            'text' => 'Default share text',
        ],
        'facebook' => [
            'url' => 'https://www.facebook.com/sharer/sharer.php?u=:url&quote=:title',
            'text' => 'Default share text',
        ],
        'hackernews' => [
            'url' => 'https://news.ycombinator.com/submitlink?t=:title&u=:url',
            'text' => 'Default share text',
        ],
        'linkedin' => [
            'url' => 'https://www.linkedin.com/sharing/share-offsite?mini=:mini&url=:url&title=:title&summary=:summary',
            'text' => 'Default share text',
            'extra' => [
                'mini' => 'true',
                'summary' => '',
            ],
        ],
        'mailto' => [
            'url' => 'mailto:?subject=:title&body=:url',
            'text' => 'Default share text',
        ],
        'pinterest' => [
            'url' => 'https://pinterest.com/pin/create/button/?url=:url',
        ],
        'pocket' => [
            'url' => 'https://getpocket.com/edit?url=:url&title=:title',
            'text' => 'Default share text',
        ],
        'reddit' => [
            'url' => 'https://www.reddit.com/submit?title=:title&url=:url',
            'text' => 'Default share text',
        ],
        'skype' => [
            'url' => 'https://web.skype.com/share?url=:url&text=:title&source=button',
            'text' => 'Default share text',
        ],
        'telegram' => [
            'url' => 'https://telegram.me/share/url?url=:url&text=:title',
            'text' => 'Default share text',
        ],
        'twitter' => [
            'url' => 'https://twitter.com/intent/tweet?text=:title&url=:url',
            'text' => 'Default share text',
        ],
        'vkontakte' => [
            'url' => 'https://vk.com/share.php?url=:url&title=:title',
            'text' => 'Default share text',
        ],
        'whatsapp' => [
            'url' => 'https://wa.me/?text=:url',
            'extra' => [
                'mini' => 'true',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    | This value specifies link templates for share providers.
    | The format of substituted elements depends on the current package templater.
    |
    |
    */

    'templates' => [
        'copylink' => '<a href=":url" class="social-button:class" id="clip":title:rel><span class="fas fa-share"></span></a>',
        'evernote' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-evernote"></span></a>',
        'facebook' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-facebook-square"></span></a>',
        'hackernews' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-hacker-news"></span></a>',
        'linkedin' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-linkedin"></span></a>',
        'mailto' => '<a href=":url" class="social-button:class":id:title:rel><span class="fas fa-envelope"></span></a>',
        'pinterest' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-pinterest"></span></a>',
        'pocket' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-get-pocket"></span></a>',
        'reddit' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-reddit"></span></a>',
        'skype' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-skype"></span></a>',
        'telegram' => '<a href=":url" class="social-button:class":id:title:rel target="_blank"><span class="fab fa-telegram"></span></a>',
        'twitter' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-twitter"></span></a>',
        'vkontakte' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-vk"></span></a>',
        'whatsapp' => '<a href=":url" class="social-button:class":id:title:rel target="_blank"><span class="fab fa-whatsapp"></span></a>',
    ],

    /*
    |--------------------------------------------------------------------------
    | Formatting elements
    |--------------------------------------------------------------------------
    |
    | These values specify a share buttons representation. Here we can specify:
    |
    | - block wrapper (block_prefix starts a block, block_suffix ends a block)
    | - element wrapper (element_prefix starts an element, element_suffix ends
    |   an element)
    |
    */

    'block_prefix' => '<div id="social-links"><ul>',
    'block_suffix' => '</ul></div>',
    'element_prefix' => '<li>',
    'element_suffix' => '</li>',

    /*
    |--------------------------------------------------------------------------
    | React on errors
    |--------------------------------------------------------------------------
    |
    | This package uses a magic __call() method in its core. Despite the fact
    | that this solution works pretty fine, it can lead to hard to find errors.
    | If you want to be aware of all the unexpected calls on the __call() method,
    | set the below option "reactOnErrors" to `true`. If not, set it to `false`.
    |
    */

    'reactOnErrors' => true,
    'throwException' => \Error::class,

];
