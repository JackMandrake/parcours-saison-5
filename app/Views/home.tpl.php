<div>
        <?php foreach($resultForCharacter as $character): ?>
        <div>
          <div>
            <img src="<?= $character->getPicture() ?>"
              alt="Card image" class="card-img">
            <div>
                <h2>
                  <?= $character->getName() ?>
                </h2>
              <div>
                <p><?= $character->getDescription() ?></p>
                <p><?= $character->getTypeId() ?></p>
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>