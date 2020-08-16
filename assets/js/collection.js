function addItemForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);



    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<div class="mt-2"></div>').append(newForm);
    $newLinkLi.before($newFormLi);
    addItemFormDeleteLink($newFormLi);
}


var $collectionHolder;

// setup an "add a tag" link
var $addTagLink = $('<button class="btn btn-light btn-sm add_script_link mt-2"><i class="fa fa-plus"></i> Add a item</button>');
var $newLinkLi = $('<div></div>').append($addTagLink);

function addItemFormDeleteLink($tagFormLi) {
    var $removeFormA = $('<button class="btn btn-danger btn-sm remove_test_link mt-1">Remove</button>');
    $tagFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the tag form
        $tagFormLi.remove();
    });
}

jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul.collections');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // add a delete link to all of the existing tag form li elements
    $collectionHolder.find('li').each(function() {

        addItemFormDeleteLink($(this));

    });


    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addTagLink.on('click', function(e) {

        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addItemForm($collectionHolder, $newLinkLi);
    });
});
