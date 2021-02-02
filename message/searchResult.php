<?php  if ($searchResult && count($searchResult["result"]) > 0) : ?>
    <div class="container-result" style="margin-bottom: 20px;">
        <p class="success">
        <?php 
            echo count($searchResult["result"]) . " result(s) for request<br />";
            foreach ($searchResult["query"] as $key => $value) : ?>
                <span style='color: black;'><?php echo $key . ": " ?></span>
                <span style='color: #3c763d;'><?php echo $value ?>.</span>
            <?php endforeach ?>
        </p>
        <table style='border: solid 1px black;width: 100%'>
            <thead>
                <tr>
                <?php foreach ($searchResult["query"] as $key => $value) : ?>
                    <th style='width:150px;border:1px solid black;'><?php echo $key ?></th>
                <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($searchResult["result"] as $result) : ?>
                    <tr>
                        <?php foreach ($result as $value) : ?>
                            <td style='width:150px;border:1px solid black;'><?php echo $value ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php elseif ($searchResult && !$searchResult["result"]) : ?>
    <p class="error">
        <?php echo "No result for request<br />";
         foreach ($searchResult["query"] as $key => $value) : ?>
            <span style='color: black;'><?php echo $key . ": " ?></span>
            <span style='color: #3c763d;'><?php echo $value ?>.</span>
        <?php endforeach ?>
    </p>
<?php endif ?>