<h2>Aide pour cfFBComments</h2>
<p class="alert blue">Gestion du plugin comments de facebook - <a href="https://developers.facebook.com/docs/plugins/comments" target="blank">https://developers.facebook.com/docs/plugins/comments</a></p>
<p class="alert green">Merci de soutenir mon travail en <strong><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8FYFQTCFQ9WZN">faisant un Don!</a></strong> Merci beaucoup.</p>
<h3 style="font-size:1.3em;font-weight:bold;padding:10px 0 10px 0">Dans les articles</h3>
<p>
Dans votre article ou bien dans le fichier <strong>article.php</strong> de votre thème, ajoutez la ligne suivante à l'endroit où vous souhaitez ajouter la gestion des commentaires.
</p>
<pre style="font-size:12px; padding-left:40px">
&lt;?php 
 global $plxShow;
 eval($plxShow->callHook('showFBComments'))
?&gt;
</pre>

<h3 style="font-size:1.3em;font-weight:bold;padding:10px 0 10px 0">Dans les pages statiques</h3>
<p>
Dans votre page ou bien directement dans le fichier <strong>static.php</strong> de votre thème, ajoutez la ligne suivante à l'endroit où vous souhaitez ajouter la gestion des commentaires.
</p>
<pre style="font-size:12px; padding-left:40px">
&lt;?php 
 global $plxShow;
 eval($plxShow->callHook('showFBCommentsStatic'))
?&gt;
</pre>

<h3>Avec les ShortCodes</h3>


<p>Nécessite <strong>spxshortcodes v1.3</strong> - <a href="http://secretsitebox.fr/site/index.php?categorie2/pluxml-plugins#post-10" target="blank">Télécharger sur secretsitebox.fr</a></p>
<p>Les shortcodes sont nécessaires dès lors que l'on édite avec un WYSIWYG</p>
<pre>[FBCOMMENTS] ou [FBCOMMENTS_STATIC]</pre>

<h3>Licence</h3>

<pre>
  GPL V3.0
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program. If not, see <http://www.gnu.org/licenses/>.
</pre>



