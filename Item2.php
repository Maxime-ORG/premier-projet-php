<?php

class Item2
{
    protected string $nameCLS;
    protected string $priceCLS;
    protected string $imageUrlCLS;
    protected string $weightCLS;
    protected string $discountCLS;

    public function getNameCLS(): string
    {
        return $this->nameCLS;
    }
    public function getPriceCLS(): string
    {
        return $this->priceCLS;
    }

    public function setNameCLS(string $nameCLS): void
    {
        $this->nameCLS = $nameCLS;
    }

    public function __construct(?string $nameCLS, ?string $priceCLS, ?string $imageUrlCLS, ?string $weightCLS, ?string $discountCLS)
    {
        $this->nameCLS = $nameCLS;
        $this->priceCLS = $priceCLS;
        $this->imageUrlCLS = $imageUrlCLS;
        $this->weightCLS = $weightCLS;
        $this->discountCLS = $discountCLS;
    }

    public function displayItem(){
        ?>
        <div class="colonneCentrale">
            <div class="colonneCentrale-colonne1">
                <img class="imageProduit" src= <?php echo $this->imageUrlCLS ?> alt="imageProduit">
            </div>
            <div class="colonneCentrale-colonne2">
                <div class = "alligne_colonne">
                    <H2><?php echo $this->nameCLS ?></H2>
                    <p> prix TTC : <?php echo formatPrice( $this->priceCLS)?> </p>
                    <p> prix HT : <?php echo formatPrice( priceExcludingVAT($this->priceCLS)) ?> </p>
                    <?php if ( $this->discountCLS != 0): ?>
                        <p> remise : -<?php echo $this->discountCLS ?> % </p>
                        <p> prix avec remise : <?php echo formatPrice(discountedPrice( $this->priceCLS, $this->discountCLS)) ?></p>
                    <?php endif; ?>
                    <p> poids : <?php echo $this->weightCLS ?> G </p>
                </div>
            </div>
        </div>
        <?php
    }
}


