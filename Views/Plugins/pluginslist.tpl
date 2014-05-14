{if $plugins}
    <table id="plugins">
        <thead>
        <th>Nzawa</th>
        <th>Opis</th>
        <th>Stan</th>
        </thead>
        <tbody>
    {section loop=$plugins name=i}
        <tr>
            <td>{$plugins[i].title}</td>
             <td>{$plugins[i].description}</td>
             {if $plugins[i].active=='true'}
                 <td><a href="/ri.class/Scripts/EditPlugins.php?plugin={$plugins[i].name}&action=remove">Wyłącz</a></td>
             {else}
                 <td><a href="/ri.class/Scripts/EditPlugins.php?plugin={$plugins[i].name}&action=add">Włącz</a></td>
             {/if}
                     
        </tr>
    {/section}
    </tbody>
    </table>

{/if}