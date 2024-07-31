<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'published_date' => '1925-04-10',
                'cover_image' => 'https://www.britishbook.ua/upload/resize_cache/iblock/48e/pbptji1ut23jpfvwdp96x0ycpmre9sum/269_448_174b5ed2089e1946312e2a80dcd26f146/kniga_the_great_gatsby.jpg',
                'description' => 'The Great Gatsby, novel by American author F. Scott Fitzgerald, published in 1925. It tells the story of Jay Gatsby, a self-made millionaire, and his pursuit of Daisy Buchanan, a wealthy young woman whom he loved in his youth. Set in 1920s New York, the book is narrated by Nick Carraway.'
            ],
            [

                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'published_date' => '1960-07-11',
                'cover_image' => 'https://www.britishbook.ua/upload/resize_cache/iblock/5bb/2y97wqfud0qxyvy9jox3hpi9ukhfsa7e/272_450_174b5ed2089e1946312e2a80dcd26f146/kniga_to_kill_a_mockingbird.jpg',
                'description' => 'To Kill a Mockingbird is a coming-of-age story about a girl named Scout. Scout and her brother Jem try to understand and relate to their father, Atticus, who is a lawyer charged with defending a Black man falsely accused of raping a white woman.'
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'published_date' => '1949-06-08',
                'cover_image' => 'https://m.media-amazon.com/images/I/61tYE6Ohy3L._AC_UF1000,1000_QL80_.jpg',
                'description' => 'Nineteen Eighty-Four by George Orwell is a dystopian novel that portrays a totalitarian society where personal freedom is non-existent. It warns against the dangers of totalitarian power, surveillance, propaganda, and thought control, in a powerful critique of modern society.'
            ],
            [
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'published_date' => '1813-01-28',
                'cover_image' => 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQdAKmciksV70_Ac-hNVBDmX-c_rgIVhWIOqBR1TrfvrXmUT8OafOpURuZ78jjaqEyQhqG8VI_v6FURj4syeONsXGUqnlR9oH-s5l4sBcnsvC5Tdq6h5xGK&usqp=CAc',
                'description' => 'Pride and Prejudice follows the turbulent relationship between Elizabeth Bennet, the daughter of a country gentleman, and Fitzwilliam Darcy, a rich aristocratic landowner. They must overcome the titular sins of pride and prejudice in order to fall in love and marry.'
            ],
            [
                'title' => 'The Catcher in the Rye',
                'author' => 'J.D. Salinger',
                'published_date' => '1951-07-16',
                'cover_image' => 'https://www.britishbook.ua/upload/resize_cache/iblock/a83/j8pcs5hu2qjjuw7kt6gsff3dk5vfe4p5/432_707_174b5ed2089e1946312e2a80dcd26f146/kniga_the_catcher_in_the_rye.png',
                'description' => 'The Catcher in the Rye, novel by J.D. Salinger published in 1951. The novel details two days in the life of 16-year-old Holden Caulfield after he has been expelled from prep school. Confused and disillusioned, Holden searches for truth and rails against the “phoniness” of the adult world.'
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'published_date' => '1937-09-21',
                'cover_image' => 'https://www.britishbook.ua/upload/resize_cache/iblock/c0e/id7oxxuam028blaobtoiszkryawwdlwl/293_448_174b5ed2089e1946312e2a80dcd26f146/kniga_the_hobbit.jpg',
                'description' => 'The Hobbit is set in Middle-earth and follows home-loving Bilbo Baggins, the hobbit of the title, who joins the wizard Gandalf and the thirteen dwarves of Thorin\'s Company, on a quest to reclaim the dwarves\' home and treasure from the dragon Smaug.'
            ],
            [
                'title' => 'Fahrenheit 451',
                'author' => 'Ray Bradbury',
                'published_date' => '1953-10-19',
                'cover_image' => 'https://book-ye.com.ua/upload/iblock/163/19a6c1fb_5721_11e9_8112_000c29ae1566_d12ec815_9f29_11ee_818f_00505684ea69.jpg',
                'description' => 'Fahrenheit 451 (1953) is regarded as Ray Bradbury\'s greatest work. The novel is about a future society where books are forbidden, and it has been acclaimed for its anti-censorship themes and its defense of literature against the encroachment of electronic media.'
            ],
            [
                'title' => 'Moby-Dick',
                'author' => 'Herman Melville',
                'published_date' => '1851-11-14',
                'cover_image' => 'https://www.britishbook.ua/upload/resize_cache/iblock/c25/lq7qbxmomxyyxg1zfdlyxuw0pk3wuckh/288_450_174b5ed2089e1946312e2a80dcd26f146/kniga_moby_dick.jpg',
                'description' => 'Moby-Dick is a novel by Herman Melville, first published in 1851. The story tells the adventures of the wandering sailor Ishmael, and his voyage on the whaleship Pequod, commanded by Captain Ahab.'
            ],
            [
                'title' => 'War and Peace',
                'author' => 'Leo Tolstoy',
                'published_date' => '1869-01-01',
                'cover_image' => 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcRq7FkQsu_9GkYN1XdYpDQ5xzXW5wUpkdMj8pAFxmp8K5sb-VaR_Su8ihP4EIcvZPv9WIDmWmT0S2E5QztEIiF0y-da7R9TctphiLeY7ATdHPd1wmXeA7pjAA&usqp=CAc',
                'description' => 'War and Peace is a novel by the Russian author Leo Tolstoy, published serially, then in its entirety in 1869. It is regarded as one of Tolstoy\'s finest works and as one of the greatest novels ever written. War and Peace is an epic about Russian society and the French invasion of Russia through the stories of five Russian aristocratic families.'
            ],
            [
                'title' => 'The Odyssey',
                'author' => 'Homer',
                'published_date' => '1967-01-01',
                'cover_image' => 'https://www.britishbook.ua/upload/resize_cache/iblock/1f1/vs0u02732jyjpyg8w2vcnmox9jf0orxb/1900_800_174b5ed2089e1946312e2a80dcd26f146/knyga_the_odyssey.jpg',
                'description' => 'The Odyssey is one of two major ancient Greek epic poems attributed to Homer. It is, in part, a sequel to the Iliad, the other Homeric epic. The Odyssey is fundamental to the modern Western canon; it is the second-oldest extant work of Western literature, while the Iliad is the oldest.'
            ],
            [
                'title' => 'Crime and Punishment',
                'author' => 'Fyodor Dostoevsky',
                'published_date' => '1866-01-01',
                'cover_image' => 'https://englishbook.com.ua/image/cache/catalog/image/catalog/new/9780007351008-the-strange-case-of-dr-jekyll-and-mr-hyde-3-600x600.jpg',
                'description' => 'Crime and Punishment (1866) is considered one of the greatest masterpieces of Russian literature. It follows a young man called Rodion Raskolnikov – first as he plots to kill an elderly pawnbroker, then as he commits the deed, and finally as he confronts the many consequences of his actions.'
            ],
            [
                'title' => 'The Brothers Karamazov',
                'author' => 'Fyodor Dostoevsky',
                'published_date' => '1880-01-01',
                'cover_image' => 'https://images.prom.ua/5591690093_w640_h640_the-karamazov-brothers.jpg',
                'description' => 'The Brothers Karamazov is a murder mystery, a courtroom drama, and an exploration of erotic rivalry in a series of triangular love affairs involving the “wicked and sentimental” Fyodor Pavlovich Karamazov and his three sons―the impulsive and sensual Dmitri; the coldly rational Ivan; and the healthy, red-cheeked young Alexey. Through the gripping events of their story, Dostoevsky portrays the whole of Russian life, is social and spiritual striving, in what was both the golden age and a tragic turning point in Russian culture.'
            ],
            [
                'title' => 'Brave New World',
                'author' => 'Aldous Huxley',
                'published_date' => '1932-08-30',
                'cover_image' => 'https://upload.wikimedia.org/wikipedia/en/6/62/BraveNewWorld_FirstEdition.jpg',
                'description' => 'Brave New World by Aldous Huxley examines a futuristic society known as the World State. It revolves around science and efficiency, where emotions and individuality are conditioned out of children at a young age. The society promotes conformity and discourages personal connections, as encapsulated in the dictum “every one belongs to every one else.”'
            ],
            [
                'title' => 'Jane Eyre',
                'author' => 'Charlotte Brontë',
                'published_date' => '1847-10-16',
                'cover_image' => 'https://www.britishbook.ua/upload/resize_cache/iblock/3e4/anz1s55osper28pvqjcgsm5qmihgkoi5/271_450_174b5ed2089e1946312e2a80dcd26f146/kniga_jane_eyre.jpg',
                'description' => 'Jane Eyre by Charlotte Brontë portrays its titular character as plain and with an elfin look. Jane describes herself as "poor, obscure, plain and little." Despite Mr. Rochester\'s compliment about her "hazel eyes and hazel hair," Jane reveals that he was mistaken—her eyes are actually green.'
            ],
            [
                'title' => 'Wuthering Heights',
                'author' => 'Emily Brontë',
                'published_date' => '1847-12-01',
                'cover_image' => 'https://nebobookshop.com.ua/cloud/files/uploads/books/978_0_7460_7537_1.jpg',
                'description' => 'Wuthering Heights by Emily Brontë is a gothic novel that follows the antihero, Heathcliff, in his quest for revenge against those who kept him from his love, Cathy Earnshaw. Over a decade later, Heathcliff achieves his revenge and gains control of Thrushcross Grange, the family home of Cathy\'s husband.'
            ],
            [
                'title' => 'The Lord of the Rings',
                'author' => 'J.R.R. Tolkien',
                'published_date' => '1954-07-29',
                'cover_image' => 'https://book-ye.com.ua/upload/iblock/6d3/e0305895_82d4_11ee_818c_00505684ea69_8629d382_82db_11ee_818c_00505684ea69.jpg',
                'description' => 'The Lord of the Rings by J.R.R. Tolkien is a fantasy epic that follows the quest of Frodo Baggins and his companions to destroy the One Ring and defeat the Dark Lord Sauron. Set in the fictional world of Middle-earth, it explores themes of heroism, friendship, and the struggle between good and evil.'
            ],

            [
                'title' => 'The Grapes of Wrath',
                'author' => 'John Steinbeck',
                'published_date' => '1939-04-14',
                'cover_image' => 'https://static.yakaboo.ua/media/catalog/product/1/0/1014133840.jpg',
                'description' => 'The Grapes of Wrath by John Steinbeck tells the story of the Joad family, tenant farmers displaced from Oklahoma by the Great Depression and the Dust Bowl. They set out for California in search of a better life, only to encounter further hardship and exploitation.'
            ],
            [
                'title' => 'Great Expectations',
                'author' => 'Charles Dickens',
                'published_date' => '1861-08-01',
                'cover_image' => 'https://www.britishbook.ua/upload/resize_cache/iblock/eda/ml362u7108n863u2ik6769jdy13qpjgm/1900_800_174b5ed2089e1946312e2a80dcd26f146/knyga_great_expectations.jpg',
                'description' => 'Great Expectations by Charles Dickens follows Pip, an orphan raised by his sister and her husband. Through a mysterious benefactor, Pip comes into wealth and moves to London, where he becomes a gentleman and pursues his great expectations.'
            ],
            [
                'title' => 'One Hundred Years of Solitude',
                'author' => 'Gabriel Garcia Marquez',
                'published_date' => '1967-05-30',
                'cover_image' => 'https://static.yakaboo.ua/media/catalog/product/i/m/img818_cr_3.jpg',
                'description' => 'One Hundred Years of Solitude by Gabriel Garcia Marquez chronicles the history of the Buendía family in the fictional town of Macondo. The novel blends magical realism with political commentary, exploring themes of solitude, love, and the cyclical nature of history.'
            ],
            [
                'title' => 'A Tale of Two Cities',
                'author' => 'Charles Dickens',
                'published_date' => '1859-04-30',
                'cover_image' => 'https://static.yakaboo.ua/media/catalog/product/1/_/1_16_37.jpg',
                'description' => 'A Tale of Two Cities by Charles Dickens is set against the backdrop of the French Revolution. It follows the intertwined lives of several characters, including Charles Darnay, a French aristocrat, and Sydney Carton, a dissolute English lawyer, as they navigate love, sacrifice, and political upheaval.'
            ],
            [
                'title' => 'Thinking, Fast and Slow: 30 Minute Expert Summary',
                'author' => 'Garamond Press',
                'published_date' => '2012-11-19',
                'cover_image' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1387717593i/19894619.jpg',
                'description' => 'Thinking, Fast and Slow ...in 30 minutes is the essential guide to quickly understanding the important lessons on decision-making outlined in the New York Times bestseller Thinking, Fast and Slow by Daniel Kahneman. The book explores how humans make decisions, the biases that affect our thinking, and practical strategies for improving decision-making.'
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }

    }
}
