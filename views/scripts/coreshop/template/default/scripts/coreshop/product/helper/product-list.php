<?php
    $uniqid = uniqid() . "-product-image-" . $this->product->getId();
    $href = $this->product->getProductUrl($this->language);
?>
<div class="col-xs-12">
    <div class="product-col list clearfix">
        <div class="image">
            <?php if($this->product->getImage() instanceof \Pimcore\Model\Asset\Image) { ?>
                <?php if($this->product->getIsNew()) { ?>
                    <div class="image-new-badge"></div>
                <?php } ?>
                <a href="<?=$href?>">
                    <?php echo $this->product->getImage()->getThumbnail("coreshop_productList")->getHtml(array("class" => "img-responsive"))?>
                </a>
            <?php } ?>
        </div>
        <div class="caption">
            <h4><a href="<?=$href?>"><?=$this->product->getName()?></a></h4>
            <div class="description">
                <?=$this->product->getShortDescription()?>
            </div>
            <?php if($this->product->getAvailableForOrder()) { ?>
                <div class="price">
                    <span class="price-new"><?=\CoreShop::getTools()->formatPrice($this->product->getPrice(\CoreShop::getTools()->displayPricesWithTax()))?></span>
                    <?=$this->template("product/helper/product-savings.php");?>
                </div>
                <div class="cart-button button-group">
                    <button type="button" title="" class="btn btn-wishlist" data-original-title="<?=$this->t("wishlist")?>" data-id="<?=$this->product->getId()?>">
                        <i class="fa fa-heart"></i>
                    </button>
                    <button type="button" title="" class="btn btn-compare" data-original-title="<?=$this->t("compare")?>" data-id="<?=$this->product->getId()?>">
                        <i class="fa fa-bar-chart-o"></i>
                    </button>

                    <?php if(!\CoreShop\Model\Configuration::isCatalogMode() && ($this->product->isAvailableWhenOutOfStock() || $this->product->getQuantity() > 0)) { ?>
                        <button type="button" class="btn btn-cart" data-id="<?=$this->product->getId()?>" data-img="#<?=$uniqid?>">
                            <?=$this->t("add to cart")?>
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
