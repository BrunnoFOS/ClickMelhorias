<div class="row">
    <div class="col-md-10 col-md-offset-1 dashboard-center">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logosmall">
        <img src="<?php echo base_url() . 'public/img/logo_click.png'?>">
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse-01">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url() . 'admin'; ?>">Histórico de ações</a></li>
          <li class="active"><a href="<?php echo base_url() . 'admin/ideas'; ?>">Ideias e comentários</a></li>
          <?php if($_SESSION['phpback_isadmin'] > 1){?>
          <li><a href="<?php echo base_url() . 'admin/users'; ?>">Gerenciamento de usuários</a></li>
          <?php if($_SESSION['phpback_isadmin'] == 3){ ?>
          <li><a href="<?php echo base_url() . 'admin/system'; ?>">Configurações do sistema</a></li>
          <?php } } ?>
        </ul>
          <p class="navbar-text navbar-right">Conectado como <span style="color:#27AE60"><?php echo $_SESSION['phpback_username']; ?></span><a href="<?php echo base_url() . 'action/logout'; ?>"><button type="button" class="btn btn-danger btn-xs" style="margin-left:10px;">Sair</button></a></p>

      </div><!-- /.navbar-collapse -->
    </nav><!-- /navbar -->
    <div>
      <h5>Ideias e comentários</h5>
      <ul class="nav nav-tabs">
        <li id="table1" class="active"><a onclick="showtable('newideastable','table1');">Novas ideias<span class="badge"><?php echo $newideas_num;?></span></a></li>
        <li id="table2"><a onclick="showtable('allideastable','table2');">Todas as ideias</a></li>
        <li id="table3"><a onclick="showtable('commentstable','table3');">Comentários denunciados</a></li>
      </ul>
      <div id="listing">
        <table id="newideastable" class="table table-condensed" style="">
          <thead>
                <tr>
                  <th>Ideia</th>
                  <th>Categoria</th>
                  <th>Comentários</th>
                  <th>Votos</th>
                  <th>Data</th>
                </tr>
            </thead>
              <tbody>
                <?php foreach ($newideas as $idea): ?>
                <?php $freename = Display::slugify($idea->title); ?>
            <tr class="<?php
            switch ($idea->status) {
              case 'considered':
                echo 'active';
                break;
              case 'declined':
                echo 'danger';
                break;
              case 'started':
                echo 'success';
                break;
              case 'planned':
                echo 'warning';
                break;
              case 'completed':
                echo 'info';
                break;
            }
            ?>">
              <td>
                <a href="<?php echo base_url() . 'home/idea/' . $idea->id . "/" . $freename;?>" target="_blank"><?php echo $idea->title; ?></a>
              </td>
              <td>
                <?php echo $categories[$idea->categoryid]->name; ?>
              </td>
              <td>
                <?php echo $idea->comments; ?> Comentários
              </td>
              <td>
                <?php echo $idea->votes; ?> Votos
              </td>
              <td>
                <?php echo $idea->date; ?>
              </td>
            </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
        <div id="allideastable" class="row" style="display:none" >
    <div class="col-md-4">
            <form role="form" method="post" action="<?php echo base_url() . 'admin/ideas';?>">
            <input type="hidden" name="search" value="1">
            <table>
            <thead>
              <tr>
                <td>
                  <label>Status</label>
                </td>
                <td>
                  <label>Categorias</label>
                </td>
              </tr>
            </thead>
            <tbody>
              <tr>
               <td>
              <div class="form-group">
                <label class="checkbox">
                  <input type="checkbox" <?php if($form['status-completed']): ?>checked="checked" <?php endif; ?> name="status-completed" data-toggle="checkbox">
                  Realizadas
                </label>
                <label class="checkbox">
                  <input type="checkbox" <?php if($form['status-started']): ?>checked="checked" <?php endif; ?> name="status-started"  data-toggle="checkbox">
                  Em andamento
                </label>
                <label class="checkbox">
                  <input type="checkbox" <?php if($form['status-planned']): ?>checked="checked" <?php endif; ?> name="status-planned"  data-toggle="checkbox">
                  Planejado
                </label>
                <label class="checkbox">
                  <input type="checkbox" <?php if($form['status-considered']): ?>checked="checked" <?php endif; ?> name="status-considered" data-toggle="checkbox">
                  Em avaliação
                </label>
                <label class="checkbox">
                  <input type="checkbox" <?php if($form['status-declined']): ?>checked="checked" <?php endif; ?> name="status-declined" data-toggle="checkbox">
                  Não aprovado
                </label>
              </div>
              </td>
              <td style="padding-left:10px;width:250px;vertical-align:top">
              <div class="form-group">
                <?php foreach ($categories as $category): ?>
                  <label class="checkbox">
                    <input type="checkbox" <?php $s = 'category-' . $category->id; if($form[$s]): ?>checked="checked" <?php endif; ?> name="category-<?php echo $category->id;?>" data-toggle="checkbox">
                    <?php echo $category->name; ?>
                  </label>
                <?php endforeach; ?>
              </div>
              </td>
              </tr>
              <tr>
              <td>
                <select class="form-control" name="orderby">
                  <option value="votes">Ordernar por votos</option>
                  <option value="id" <?php if($form['orderby'] == 'id') echo 'selected=""';?> >Ordernar por data</option>
                  <option value="title" <?php if($form['orderby'] == 'title') echo 'selected=""';?>>Ordernar por título</option>
                </select>
               </td>
               <td style="padding-left:10px;">
                 <label class="checkbox"t>
                    <input type="checkbox" <?php if($form['isdesc']) echo 'checked=""';?> name="isdesc" data-toggle="checkbox">
                    Ordem descrescente
                  </label>
               </td>
              </tr>
              <tr>
              <td colspan="2" style="padding-top:5px;padding-bottom:10px">
                <button type="submit" class="btn btn-primary" style="width:160px">Pesquisar</button>
              </td>
              </tr>
              </tbody>
              </table>
            </form>
          </div>
    <div class="col-md-7">
          <table class="table table-condensed" style="font-size:15px;width:100%">
            <thead>
            <tr>
              <th>Ideia</th>
              <th>Categoria</th>
              <th>Votos</th>
              <th>Data</th>
            </tr>
         </thead>
          <tbody>
            <?php foreach ($ideas as $idea): ?>
            <?php $freename = Display::slugify($idea->title); ?>
        <tr class="<?php
        switch ($idea->status) {
          case 'considered':
            echo 'active';
            break;
          case 'declined':
            echo 'danger';
            break;
          case 'started':
            echo 'success';
            break;
          case 'planned':
            echo 'warning';
            break;
          case 'completed':
            echo 'info';
            break;
        }
        ?>">
          <td>
            <a href="<?php echo base_url() . 'home/idea/' . $idea->id . "/" . $freename;?>" target="_blank"><?php echo $idea->title; ?></a>
          </td>
          <td>
            <?php echo $categories[$idea->categoryid]->name; ?>
          </td>
          <td>
            <?php echo $idea->votes; ?> Votos
          </td>
          <td>
            <?php echo $idea->date; ?>
          </td>
        </tr>
          <?php endforeach; ?>
      </tbody>
          </table>
          </div>
      </div>
      <table id="commentstable" class="table table-condensed" style="display:none;font-size:15px;">
          <thead>
                <tr>
                  <th>ID</th>
                  <th>Comentário</th>
                  <th>Denúncias</th>
                </tr>
          </thead>
          <tbody>
                <?php foreach ($flags as $comment) : ?>
                  <tr>
                  <td>
                    Comentário: #<?php echo $comment['id'];?>
                    <br>Usuário:
                    <a href="<?php echo base_url() . 'admin/users/' . $comment['userid'];?>">#<?php echo $comment['userid'];?></a>
                    <br>Ideia:
                    <a href="<?php echo base_url() . 'home/idea/' . $comment['ideaid'];?>" target="_blank">#<?php echo $comment['userid'];?></a>
                  </td>
                  <td>
                    <samp>
                      <?php echo $comment['content'];?>
                    </samp>
                  </td>
                  <td>
                    <span style="font-size:17px;">Denunciado <span class="badge"><?php echo $comment['votes']; ?></span><span style="font-size:17px;"> vezes</span>
                    <div class="pull-right">
                      <button name="Delete votes" type="submit" class="btn btn-warning btn-sm" style="width:130px" <?php $temp = base_url() . 'adminaction/deletecomment/' . $comment['id']; ?> onclick="popup_sure('Are you sure you want to delete this comment?','<?php echo $temp; ?>');">Excluir comentário</button>
                      <?php if($_SESSION['phpback_isadmin'] > 1): ?><a href="<?php echo base_url() . 'admin/users/' . $comment['userid']; ?>"><button type="submit" class="btn btn-danger btn-sm" style="width:130px">Banir usuário</button></a><?php endif;?>
                    </div>
                  </td>
                  </tr>
                <?php endforeach; ?>
          </tbody>
        </table>
    </div>
</div>
</div>
</div>
  </body>
  </html>
