jQuery(document).ready(function($){
    let templateAddSection = $("#tmpl-elementor-add-section");

    if (0 < templateAddSection.length) {
        var oldTemplateButton = templateAddSection.html();
        oldTemplateButton = oldTemplateButton.replace(
            '<div class="elementor-add-section-drag-title',
            '<div class="elementor-add-section-area-button elementor-add-theme-upsell-button" style="background:#3A57A6;"><i class="eicon-download-bold" style="color:#fff;"></i></div><div class="elementor-add-section-drag-title'
        );
        templateAddSection.html(oldTemplateButton);
    }

    elementor.on("preview:loaded", function () {
        $(elementor.$previewContents[0].body).on("click", ".elementor-add-theme-upsell-button", function (event) {
            window.wpelUpsell = elementorCommon.dialogsManager.createWidget("lightbox",{
                id: "wpel-theme-upsell-popup",
                headerMessage: !1,
                message: "",
                hide: {
                    auto: !1,
                    onClick: !1,
                    onOutsideClick: false,
                    onOutsideContextMenu: !1,
                    onBackgroundClick: !0,
                },
                position: {
                    my: "center",
                    at: "center",
                },
                onShow: async function () {
                    var contentTemp = $(".dialog-content-wpelupsell")
                    var cloneMarkup = $("#wpel-theme-upsell-wrap")
                    cloneMarkup = cloneMarkup.clone(true).show()
                    contentTemp.html(cloneMarkup);

                    let collectionsArray = [];

                    await $.ajax({
                      url: modal_templates_script.ajaxurl,
                      type: 'POST',
                      data: {
                          action: 'get_collections'
                      },
                      success: function(response) {
                        if ( response.success && response.data ) {
                          collectionsArray = response.data.collections.map(collection => ({
                            id: collection.id.replace('gid://shopify/Collection/', ''),
                            title: collection.title
                          }));
                        }
                      }
                    });

                    $.ajax({
                        url: modal_templates_script.ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'get_filtered_products',
                            handle: '',
                            page: 0,
                            collectionIds: []
                        },
                        success: function(response) {
                            if ( response.success && response.data ) {

                                var productsHTML = `<div class="popup-main">
                                    <div class="popup-header">
                                        <div class="popup-header-inner">
                                            <img src="https://cdn.shopify.com/s/files/1/0640/0884/7520/files/modal-popup-logo.png?v=1723526462" alt="">
                                            <div class="header-banner-img">
                                            <img src="https://cdn.shopify.com/s/files/1/0640/0884/7520/files/modal-popup-banner-new.png?v=1723526343" alt="">
                                                <div class="header-banner-inner">
                                                    <h3> Get Flat 30% OFF On Premium Themes</h3>
                                                </div>
                                            </div>
                                            <div class="header-btn">
                                                <a type="button" target="_blank" href="https://wordpress.org/support/plugin/wpelemento-importer/" name="button">Review Us 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                        <g id="Group_56" data-name="Group 56" transform="translate(-0.003)">
                                                            <g id="Group_45" data-name="Group 45" transform="translate(7.621 11.668)">
                                                            <g id="Group_44" data-name="Group 44">
                                                                <path id="Path_24" data-name="Path 24" d="M135.467,206.166a.566.566,0,1,0,.166.4A.571.571,0,0,0,135.467,206.166Z" transform="translate(-134.5 -206)" fill="#fff"/>
                                                            </g>
                                                            </g>
                                                            <g id="Group_47" data-name="Group 47" transform="translate(0.003)">
                                                            <g id="Group_46" data-name="Group 46" transform="translate(0)">
                                                                <path id="Path_25" data-name="Path 25" d="M27.3,0H4.761a1.7,1.7,0,0,0-1.7,1.7v9.4a1.7,1.7,0,0,0,1.7,1.7H5.78a.566.566,0,1,0,0-1.133H4.761a.567.567,0,0,1-.566-.566V1.7a.567.567,0,0,1,.566-.566H27.3a.567.567,0,0,1,.566.566v9.4a.567.567,0,0,1-.566.566H23.515a.566.566,0,0,0-.4.166L21.25,13.7l-1.865-1.865a.566.566,0,0,0-.4-.166H14.567a3.326,3.326,0,0,0-.142-.316A3.223,3.223,0,0,0,12.481,9.73l-.819-.249a.566.566,0,0,0-.7.349L9.678,13.387A4.286,4.286,0,0,1,7.7,15.695l-1.208.658a1.615,1.615,0,0,0-1.249-.59H1.62A1.619,1.619,0,0,0,0,17.379v10A1.619,1.619,0,0,0,1.62,29H5.239a1.617,1.617,0,0,0,1.35-.729l.578.227a7.244,7.244,0,0,0,2.656.5h7.642a2.078,2.078,0,0,0,1.8-3.122,2.078,2.078,0,0,0,1.163-3.05,2.079,2.079,0,0,0-.1-3.955,2.078,2.078,0,0,0-1.8-3.112H13.98l.635-1.886a3.255,3.255,0,0,0,.171-1.075h3.963l2.1,2.1a.566.566,0,0,0,.8,0l2.1-2.1H27.3A1.7,1.7,0,0,0,29,11.1V1.7A1.7,1.7,0,0,0,27.3,0ZM5.724,27.383a.485.485,0,0,1-.484.484H1.62a.485.485,0,0,1-.484-.484v-10a.485.485,0,0,1,.484-.484H2.863v6.974a.566.566,0,1,0,1.133,0V16.895H5.239a.485.485,0,0,1,.457.326.555.555,0,0,0,.02.082.486.486,0,0,1,.007.077v10Zm12.8-10.488h0a.947.947,0,0,1,0,1.894H15.449a.566.566,0,0,0,0,1.133h4.287a.947.947,0,0,1,0,1.894H15.449a.566.566,0,0,0,0,1.133h3.194a.947.947,0,1,1,0,1.894H15.449a.566.566,0,1,0,0,1.133h2.018a.947.947,0,0,1,0,1.894H9.824a6.119,6.119,0,0,1-2.243-.424l-.725-.284V17.442l1.381-.752a5.417,5.417,0,0,0,2.506-2.917l1.1-3.051.3.093a2.116,2.116,0,0,1,1.39,2.7l-.887,2.633a.566.566,0,0,0,.537.747Z" transform="translate(-0.003)" fill="#fff"/>
                                                            </g>
                                                            </g>
                                                            <g id="Group_49" data-name="Group 49" transform="translate(20.381 3.32)">
                                                            <g id="Group_48" data-name="Group 48">
                                                                <path id="Path_26" data-name="Path 26" d="M365.8,60.79a.9.9,0,0,0-.731-.616l-1-.145-.448-.908a.9.9,0,0,0-.811-.5h0a.9.9,0,0,0-.811.5l-.448.908-1,.146a.9.9,0,0,0-.5,1.544l.725.706-.171,1a.9.9,0,0,0,1.313.953l.9-.471.9.471a.9.9,0,0,0,1.313-.954l-.171-1,.725-.707A.9.9,0,0,0,365.8,60.79Zm-1.83.907a.9.9,0,0,0-.26.8l.113.661-.594-.312a.9.9,0,0,0-.842,0l-.593.312.113-.661a.9.9,0,0,0-.26-.8l-.48-.468.663-.1a.9.9,0,0,0,.681-.5l.3-.6.3.6a.9.9,0,0,0,.681.495l.663.1Z" transform="translate(-359.773 -58.617)" fill="#fff"/>
                                                            </g>
                                                            </g>
                                                            <g id="Group_51" data-name="Group 51" transform="translate(13.175 3.32)">
                                                            <g id="Group_50" data-name="Group 50">
                                                                <path id="Path_27" data-name="Path 27" d="M238.588,60.79a.9.9,0,0,0-.731-.616l-1-.145-.448-.908a.9.9,0,0,0-.811-.5h0a.9.9,0,0,0-.811.5l-.448.908-1,.146a.9.9,0,0,0-.5,1.544l.725.706-.171,1a.9.9,0,0,0,1.313.953l.9-.471.9.471a.9.9,0,0,0,1.313-.954l-.171-1,.725-.707A.9.9,0,0,0,238.588,60.79Zm-1.83.907a.9.9,0,0,0-.26.8l.113.661-.594-.312a.9.9,0,0,0-.842,0l-.593.312.113-.661a.9.9,0,0,0-.26-.8l-.48-.468.663-.1a.9.9,0,0,0,.681-.5l.3-.6.3.6a.9.9,0,0,0,.681.495l.663.1Z" transform="translate(-232.56 -58.617)" fill="#fff"/>
                                                            </g>
                                                            </g>
                                                            <g id="Group_53" data-name="Group 53" transform="translate(5.97 3.32)">
                                                            <g id="Group_52" data-name="Group 52">
                                                                <path id="Path_28" data-name="Path 28" d="M111.375,60.79a.9.9,0,0,0-.731-.616l-1-.145-.448-.908a.9.9,0,0,0-.811-.5h0a.9.9,0,0,0-.811.5l-.448.908-1,.146a.9.9,0,0,0-.5,1.544l.725.706-.171,1a.9.9,0,0,0,1.313.953l.9-.471.9.471a.9.9,0,0,0,1.313-.954l-.171-1,.725-.707A.9.9,0,0,0,111.375,60.79Zm-1.83.907a.9.9,0,0,0-.26.8l.113.661-.594-.312a.9.9,0,0,0-.842,0l-.593.312.113-.661a.9.9,0,0,0-.26-.8l-.48-.468.663-.1a.9.9,0,0,0,.681-.5l.3-.6.3.6a.9.9,0,0,0,.681.495l.663.1Z" transform="translate(-105.347 -58.617)" fill="#fff"/>
                                                            </g>
                                                            </g>
                                                            <g id="Group_55" data-name="Group 55" transform="translate(2.863 25.339)">
                                                            <g id="Group_54" data-name="Group 54">
                                                                <path id="Path_29" data-name="Path 29" d="M51.07,447.359a.566.566,0,0,0-.566.566v.009a.566.566,0,0,0,1.133,0v-.009A.566.566,0,0,0,51.07,447.359Z" transform="translate(-50.504 -447.359)" fill="#fff"/>
                                                            </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                                <a type="button" target="_blank" href="https://www.wpelemento.com/pages/community" name="button">Talk to Support 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.549" height="24.964" viewBox="0 0 25.549 24.964">
                                                        <g id="Group_32" data-name="Group 32" transform="translate(-0.643 -1.361)">
                                                            <path id="Path_16" data-name="Path 16" d="M24.623,12.174a11.213,11.213,0,0,0-22.411,0A2.637,2.637,0,0,0,.643,14.582v2.958a2.638,2.638,0,0,0,2.635,2.635,1.707,1.707,0,0,0,1.7-1.7V13.652a1.7,1.7,0,0,0-1.538-1.688,9.99,9.99,0,0,1,19.944,0,1.7,1.7,0,0,0-1.536,1.688V18.47a1.7,1.7,0,0,0,1.559,1.69v1.218a2.49,2.49,0,0,1-2.487,2.487H19.082a1.831,1.831,0,0,0-1.738-1.238h-1.9a1.822,1.822,0,0,0-.774.169A1.853,1.853,0,0,0,13.6,24.476a1.851,1.851,0,0,0,1.849,1.849h1.9a1.856,1.856,0,0,0,1.74-1.238h1.841a3.713,3.713,0,0,0,3.709-3.709V19.943a2.637,2.637,0,0,0,1.559-2.4V14.581a2.637,2.637,0,0,0-1.569-2.407ZM3.76,13.652V18.47a.483.483,0,0,1-.483.483A1.415,1.415,0,0,1,1.865,17.54V14.582a1.414,1.414,0,0,1,1.413-1.413A.483.483,0,0,1,3.76,13.652Zm14.2,10.955a.63.63,0,0,1-.614.5h-1.9a.627.627,0,0,1-.26-1.2.607.607,0,0,1,.26-.057h1.9a.629.629,0,0,1,.614.757ZM24.97,17.54a1.415,1.415,0,0,1-1.413,1.413.483.483,0,0,1-.483-.483V13.652a.483.483,0,0,1,.483-.483,1.415,1.415,0,0,1,1.413,1.413Z" fill="#fff"/>
                                                            <path id="Path_17" data-name="Path 17" d="M26.434,26.384a2.592,2.592,0,0,0,2.589-2.589V18.518a2.593,2.593,0,0,0-2.589-2.589H18.52a2.592,2.592,0,0,0-2.589,2.589v5.276a2.592,2.592,0,0,0,2.589,2.589h.048v1.367a1.269,1.269,0,0,0,1.268,1.273,1.243,1.243,0,0,0,.895-.378l2.274-2.262Zm-4.111-1.045-2.461,2.448a.031.031,0,0,1-.042.01.041.041,0,0,1-.028-.046V25.773a.611.611,0,0,0-.611-.611h-.66a1.369,1.369,0,0,1-1.367-1.367V18.518a1.369,1.369,0,0,1,1.367-1.367h7.914A1.37,1.37,0,0,1,27.8,18.518v5.276a1.369,1.369,0,0,1-1.367,1.367h-3.68A.612.612,0,0,0,22.323,25.339Z" transform="translate(-9.06 -8.633)" fill="#fff"/>
                                                            <path id="Path_18" data-name="Path 18" d="M23.4,26.787a.9.9,0,1,0,.9.9A.9.9,0,0,0,23.4,26.787Z" transform="translate(-12.953 -15.068)" fill="#fff"/>
                                                            <path id="Path_19" data-name="Path 19" d="M30.688,26.787a.9.9,0,1,0,.9.9A.9.9,0,0,0,30.688,26.787Z" transform="translate(-17.27 -15.068)" fill="#fff"/>
                                                            <path id="Path_20" data-name="Path 20" d="M37.974,26.787a.9.9,0,1,0,.9.9A.9.9,0,0,0,37.974,26.787Z" transform="translate(-21.588 -15.068)" fill="#fff"/>
                                                        </g>
                                                    </svg>
                                                </a>
                                                <button class="cancel-btn-main" type="button" name="button"><i class="eicon-close"></i></button>
                                            </div>
                                        </div>
                                        <div class="popup-content">
                                            <div class="popup-content-inner">
                                                <div class="popup-content-left">
                                                  <div class="popup-cat">
                                                    <h3>Templates Categories</h3>
                                                      <ul class="wpel-popup-collections-wrap">`;
                                                        collectionsArray.forEach(function(collection) {
                                                          productsHTML += `<li><input type="checkbox" value="`+ collection.id +`"><span>`+ collection.title +`</span></li>`;
                                                        });
                                                      productsHTML += `</ul>
                                                  </div>
                                                  <div class="popup-left-btm-banner">
                                                    <h4>ELEMENTOR THEME BUNDLE</h4>
                                                    <p>Get Access to 48+ Elementor Themes at an unbeatable price of just $79</p>
                                                    <a href="https://www.wpelemento.com/products/wordpress-theme-bundle" target="_blank">BUY NOW</a>
                                                    <img src="https://cdn.shopify.com/s/files/1/0640/0884/7520/files/bundle-banner-image.png?v=1723786884">
                                                  </div>
                                                </div>
                                                <div class="popup-content-right">
                                                    <div class="main-grid-search-wrapper" style="position:relative">
                                                        <input type="text" name="search_themes" class="wpel-main-grid-search" placeholder="Search..">
                                                        <svg class="svg-inline--fa fa-magnifying-glass" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path></svg>
                                                    </div>
                                                    <div class="popup-content-cards-outer">
                                                        <div class="popup-content-cards-main">`;

                                                            response.data.products.forEach(function(product) {

                                                                var title = product.title ? product.title : 'No Title Available';
                                                                var handle = product.handle ? product.handle : '';
                                                                var previewLink = product.demo ? product.demo : '#';
                                                                var imageSrc = product.image ? product.image : 'https://via.placeholder.com/300';

                                                                productsHTML += `<div class="main-grid-card-parent">
                                                                    <div class="main-grid-card-parent-inner">
                                                                        <div class="main-grid-card-parent-inner-image-head">
                                                                            <img class="main-grid-card-parent-inner-image" src="`+ imageSrc +`" width="100" height="100" alt="`+ title +`">
                                                                        </div>
                                                                        <div class="main-grid-card-parent-inner-description">
                                                                            <h3>`+ title +`</h3>
                                                                            <div class="main-grid-card-parent-inner-button">
                                                                                <a target="_blank" href="`+ product.permalink +`" class="main-grid-card-parent-inner-button-buy">Buy Now</a>
                                                                                <a target="_blank" href="`+ previewLink +`" class="main-grid-card-parent-inner-button-preview">Demo</a>
                                                                                <a class="main-grid-card-parent-inner-button-preview"><svg xmlns="http://www.w3.org/2000/svg" width="9.872" height="10.119" viewBox="0 0 9.872 10.119">
                                                                                <g id="Group_33" data-name="Group 33" transform="translate(-11 -10.151)">
                                                                                    <path id="Path_21" data-name="Path 21" d="M22.609,10.151v3.035h-1.7l2.917,4.376,2.917-4.376h-1.7V10.151ZM25.229,14l-1.4,2.107L22.42,14h1V10.961h.81V14Z" transform="translate(-8.469)" fill="#fff"/>
                                                                                    <path id="Path_22" data-name="Path 22" d="M18.9,53.544H11.81V51.383H11v2.971h8.711V51.383H18.9Z" transform="translate(0 -35.247)" fill="#fff"/>
                                                                                    <path id="Path_23" data-name="Path 23" d="M25.146,59.379v2.972H16v-.81h8.336V59.379Z" transform="translate(-4.274 -42.082)" fill="#fff"/>
                                                                                </g>
                                                                                </svg>`+ product.downloadCount +`</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>`;

                                                            });
                                                        productsHTML += `</div>
                                                        <div class="main-grid-card-load-more-parent text-center my-2">`;

                                                            const response_object = response.data;let nextPage = 0;
                                                            if (response_object.pagination) {
                                                                if (response_object.pagination.hasNextPage) {
                                                                    nextPage = parseInt(response_object.pagination.page);
                                                                }
                                                            }
            
                                                                productsHTML += `<input type="hidden" name="wpel_load_more" value="`+ nextPage +`">`;
                                                                productsHTML += `<button class="btn btn-primary wpel_popup_template_pagination">Load More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

                                contentTemp.append(productsHTML);
                            }
                        }
                    }).done(function(response){

                        const response_object = response.data;

                        if (response_object.pagination) {
                            if (!response_object.pagination.hasNextPage) {
                                $('.main-grid-card-load-more-parent').hide();
                            }
                        }
                    });


                },
                onHide: function () {
                    window.wpelUpsell.destroy();
                }
            });
            window.wpelUpsell.getElements("header").remove();
            window.wpelUpsell.getElements("message").append(
            window.wpelUpsell.addElement("content-wpelupsell")
            );
            window.wpelUpsell.show();
        });

        function debounce(func, delay) {
            let timeoutId;
            return function() {
                const context = this;
                const args = arguments;
                clearTimeout(timeoutId);
                timeoutId = setTimeout(() => {
                    func.apply(context, args);
                }, delay);
            };
        }

        $('body').on("input", ".wpel-main-grid-search", debounce(function (event) {

            let checkedValues = [];
            $('.wpel-popup-collections-wrap input[type="checkbox"]:checked').each(function() {
                checkedValues.push($(this).val());
            });
            const search_field = $('.wpel-main-grid-search').val();

            const page = 0;

            wpel_append_product_records(search_field, checkedValues, page, '');

        }, 300));

        function wpel_append_product_records(search_field, checkedValues, page, action) {

            $.ajax({
                url: modal_templates_script.ajaxurl,
                type: 'POST',
                data: {
                    action: 'get_filtered_products',
                    handle: search_field,
                    page: page,
                    collectionIds: checkedValues
                },
                success: function(response) {
                    if ( response.success && response.data ) {

                        const response_object = response.data;let nextPage = 0;
                        if (response_object.pagination) {
                            if (response_object.pagination.hasNextPage) {
                                nextPage = parseInt(response_object.pagination.page);
                                $('[name="wpel_load_more"]').val(nextPage);
                                $('.main-grid-card-load-more-parent').show();
                            } else {
                                $('.main-grid-card-load-more-parent').hide();
                            }
                        }

                        if ( action != 'load' ) {
                            $('.popup-content-cards-main').empty();
                        }


                        var productsHTML = '';

                        response.data.products.forEach(function(product) {

                            var title = product.title ? product.title : 'No Title Available';
                            var handle = product.handle ? product.handle : '';
                            var previewLink = product.demo ? product.demo : '#';
                            var imageSrc = product.image ? product.image : 'https://via.placeholder.com/300';

                            productsHTML += `<div class="main-grid-card-parent">
                                <div class="main-grid-card-parent-inner">
                                    <div class="main-grid-card-parent-inner-image-head">
                                        <img class="main-grid-card-parent-inner-image" src="`+ imageSrc +`" width="100" height="100" alt="`+ title +`">
                                    </div>
                                    <div class="main-grid-card-parent-inner-description">
                                        <h3>`+ title +`</h3>
                                        <div class="main-grid-card-parent-inner-button">
                                            <a target="_blank" href="`+ product.permalink +`" class="main-grid-card-parent-inner-button-buy">Buy Now</a>
                                            <a target="_blank" href="`+ previewLink +`" class="main-grid-card-parent-inner-button-preview">Demo</a>
                                            <a class="main-grid-card-parent-inner-button-preview"><svg xmlns="http://www.w3.org/2000/svg" width="9.872" height="10.119" viewBox="0 0 9.872 10.119">
                                              <g id="Group_33" data-name="Group 33" transform="translate(-11 -10.151)">
                                                <path id="Path_21" data-name="Path 21" d="M22.609,10.151v3.035h-1.7l2.917,4.376,2.917-4.376h-1.7V10.151ZM25.229,14l-1.4,2.107L22.42,14h1V10.961h.81V14Z" transform="translate(-8.469)" fill="#fff"/>
                                                <path id="Path_22" data-name="Path 22" d="M18.9,53.544H11.81V51.383H11v2.971h8.711V51.383H18.9Z" transform="translate(0 -35.247)" fill="#fff"/>
                                                <path id="Path_23" data-name="Path 23" d="M25.146,59.379v2.972H16v-.81h8.336V59.379Z" transform="translate(-4.274 -42.082)" fill="#fff"/>
                                              </g>
                                            </svg> `+ product.downloadCount +`</a>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

                        });

                        $('.popup-content-cards-main').append(productsHTML);
                    }
                }
            });
        }

        $('body').on("click", ".wpel_popup_template_pagination", function (event) {

            const page = $('[name="wpel_load_more"]').val();

            let checkedValues = [];
            $('.wpel-popup-collections-wrap input[type="checkbox"]:checked').each(function() {
                checkedValues.push($(this).val());
            });

            const search_field = $('.wpel-main-grid-search').val();

            wpel_append_product_records(search_field, checkedValues, page, 'load');
        });

        $('body').on("click", ".cancel-btn-main", function () {
            window.wpelUpsell.destroy();
        })

        $('body').on("click", ".wpel-popup-collections-wrap li", function (event) {
            const checkbox = $(this).find('input[type="checkbox"]');
            checkbox.prop('checked', !checkbox.prop('checked'));

            let checkedValues = [];
            $('.wpel-popup-collections-wrap input[type="checkbox"]:checked').each(function() {
                checkedValues.push($(this).val());
            });

            const search_field = $('.wpel-main-grid-search').val();

            const page = 0;

            wpel_append_product_records(search_field, checkedValues, page, '');
        });
    })

});
