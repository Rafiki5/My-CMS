<section id="content">
    {$page.body}    
</section>
<aside id="mine-menu">
    {if $menu}
        <ul>Menu
            {foreach from=$menu item=item}
            {if $item.pactive and $item.mactive}
                <li><a href="{$item.path}">{$item.name}</a></li>
            {/if}
            {/foreach}
        </ul>
        
    {/if}
</aside>
