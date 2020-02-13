
<div id="formReport_block">
        <form action="index.php?action=report&comment_id=<?= $comment['id']; ?>" method="POST"> 
            <div class="formReport-group">
                <label for="form-pseudo" class="case_name">Votre pseudo <span>(en moins de 255 caractères)</span></label>
                <input type="text" class="form-control" name="form-pseudo" id="form-pseudo" placeholder="Pseudo" required>
            </div>
            <div class="formReport-group">
                <label for="reportType" class="case_name">motif :</label>
                <input type="radio" name="reportType" id="reportType"  placeholder="Commentaire" required/>   
            </div>
            <div class="formReport-group">
                <button type="submit" class="button">Envoyer</button>
            </div>     
        </form>
</div>