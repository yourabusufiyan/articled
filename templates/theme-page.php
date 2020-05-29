

<div class="articled-header">
    <h1><?php _e('Articled Theme', 'articled'); ?></h1>
    <p><?php _e('Articled is a WordPress theme for personal blog', 'articled'); ?></p>
</div>

<hr/>

<div>
<table class="articled-table">

  <tr>
    <th class="basic-cell"><?php _e('Features', 'articled'); ?></th>
    <th><?php _e('Normal', 'articled'); ?></th>
    <th class="articled-table-pro"><?php _e('Pro', 'articled'); ?></th>
  </tr>

  <?php 
    $features = [
        [ __('Top Bar', 'articled'), false, true ],
        [ __('Header Style', 'articled'), false, true ],
        [ __('Blog Style', 'articled'), false, true ],
        [ __('Single Post content manager', 'articled'), false, true ],
        [ __('Color Contomizing', 'articled'), false, true ],
        
    ];

    foreach( $features as $key => $feature ) :
        if( $feature[1] == 'heading' ) {
            echo '<tr class="articled-table-section-header"><td colspan="3">' . esc_html( $feature[0] ) . '</td></tr>';
            continue;
        }
        echo '<tr class="articled-table-row">';
            echo '<td>' . esc_html( $feature[0] ) . '</td>';
            echo '<td>' . ( boolval($feature[1]) ? '<i class="fa fa-check"></i>' : '<i class="fas fa-times"></i>' ) . '</td>';
            echo '<td>' . ( boolval($feature[2]) ? '<i class="fa fa-check"></i>' : '<i class="fas fa-times"></i>' ) . '</td>';
        echo '</tr>';
    endforeach; 
    
    ?>

  

  <tr class="articled-table-footer">
    <td></td>
    <td><a href=""></a></td>
    <td><a href="https://github.com/yourabusufiyan/articled-pro" target="blank"><?php _e('Free Download Now!', 'articled'); ?></a></td>
  </tr>

</table>
</div>

<style>
body{
  font-family:Roboto;
  font-size:13px;
  color:#666;
  font-weight:300;
  padding:10px;
}

.articled-table{
  border-collapse:collapse;
  width: 100%;
}
.articled-table .basic-cell{
  text-align: left;
}
.articled-table td,
.articled-table th{
  padding:10px 15px;
  border:1px solid #d8d8d8;
  min-width:130px;
  max-width:300px;
  text-align:center;
}
.articled-table .articled-table-section-header td{
  font-weight:500;
  font-size:12px;
  padding-top:20px;
  color:#222;
  text-transform:uppercase;
  background:#f9f9f9;
  letter-spacing:1px;
}
.articled-table .articled-table-desc{
  display:block;
  font-size:11px;
  color:#aaa;
  max-height:0;
  overflow:hidden;
  margin:0;
}
/* .articled-table tr:hover .articled-table-desc{
  max-height:100px;
  color:#eee;
  padding-top:8px;
  transition:max-height .3s ease-in;
} */
.articled-table th{
  background:#f9f9f9;
  font-weight:500;
  text-transform:uppercase;
  color:#666;
  padding-top:20px;
  padding-bottom:20px;
  letter-spacing:2px;
  font-size:14px;
}
.articled-table .articled-table-pro{
  background:#9e3167;
  color:white;
  border-color:#9e3167;
}
.articled-table td:first-child{
  text-align:left;
}
.articled-table .fa-check{
  color:#7ab55c;
}
.articled-table .fa-close{
  color:#b55c68;
}

.articled-table tr.articled-table-row:hover{
  background:#7ab55c;
}
.articled-table tr.articled-table-row:hover td{
  border-color:#7ab55c;
}
.articled-table tr.articled-table-row:hover td,
.articled-table tr.articled-table-row:hover td .fa{
  color:#fff;
}
</style>