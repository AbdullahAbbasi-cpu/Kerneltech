<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContentPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Reset the site_settings table
         */
        if (\App::environment() == 'local') {
            \DB::table('site_settings')->truncate();
        }


        \DB::table('content_pages')->insert([
            'page_identifier' => 'terms-and-condition',
            'meta_title' => 'Terms & Condition',
            'meta_description' => 'Review our guidelines for product utilization and service provision to establish a transparent and equitable connection between users and our platform.',
            'banner_image' => 'terms-and-condition-banner.png',
            'banner_title' => 'Terms & Condition',
            'banner_description' => '<p>We started our journey in 2012. And looking back it has been an awesome ride with lots of ups and downs. But whatever be the situation, we were always trying to move forward.</p><p>Icing croissant croissant jelly gummi bears cotton candy jujubes apple pie caramels. Dragée soufflé bonbon powder. Sesame snaps sugar plum chupa chups tart wafer caramels toffee.</p>',
            'content' => '<p>Access to and use of this site (www.kerneltech.net) is provided by KernelTech. subject to the following terms:</p><p>By using this site you agree to be legally bound by these terms, which shall take effect immediately on your first use of the site. If you do not agree to be legally bound by all the following terms please do not access and/or use this site.</p><p>KernelTech may change these terms at any time by posting changes online. Please review these terms regularly to ensure you are aware of any changes made. Your continued use of this site after changes are posted means you agree to be legally bound by these terms as updated and/or amended.</p><h4><strong>Use of www.KernelTech.net</strong></h4><p>You may not copy, reproduce, republish, download, post, broadcast, transmit, make available to the public, or otherwise use this site’s content in any way except for your own personal, non-commercial use. You also agree not to adapt, alter or create a derivative work from any content except for your own personal, non-commercial use. Any other use of this site’s content requires the prior written permission of KernelTech.</p><p>You agree to use this site only for lawful purposes, and in a way that does not infringe the rights of, restrict or inhibit anyone else’s use and enjoyment of this site. Prohibited behavior includes harassing or causing distress or inconvenience to any person, transmitting obscene or offensive content or disrupting the normal flow of dialogue within this site.</p><h4><strong>Disclaimers and limitation of liability</strong></h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><h4><strong>General</strong></h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>',
            'about_image_1' => '',
            'about_content_1' => '',
            'about_image_2' => '',
            'about_content_2' => '',
        ]);

        \DB::table('content_pages')->insert([
            'page_identifier' => 'privacy-policy',
            'meta_title' => 'Privacy Policy',
            'meta_description' => 'Explore our approach to safeguarding your data and preserving your privacy rights by outlining our practices for data collection, utilization, and protection.',
            'banner_image' => 'privacy-policy-banner.png',
            'banner_title' => 'Privacy Policy',
            'banner_description' => '<p>We started our journey in 2012. And looking back it has been an awesome ride with lots of ups and downs. But whatever be the situation, we were always trying to move forward.</p><p>Icing croissant croissant jelly gummi bears cotton candy jujubes apple pie caramels. Dragée soufflé bonbon powder. Sesame snaps sugar plum chupa chups tart wafer caramels toffee.</p>',
            'content' => '<p>bonbon powder. Sesame snaps sugar plum chupa chups tart wafer caramels toffee.</p><p>With constant evolution in the development of Web technology, we can finally say that the future of the Web is here. However, if we go back in time and look at the era of the 90s and how the world used to be back then, we would find out that there was only Web1, primarily a read-only medium</p><h4><strong>Personal data</strong></h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><h4><strong>Use of personal data</strong></h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><h4><strong>Personally non-identifiable information</strong></h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><h4><strong>Passively collected information</strong></h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>',
            'about_image_1' => '',
            'about_content_1' => '',
            'about_image_2' => '',
            'about_content_2' => '',
        ]);

        \DB::table('content_pages')->insert([
            'page_identifier' => 'about',
            'meta_title' => 'About',
            'meta_description' => 'Discover our mission, core values, and evolution as we endeavor to provide exceptional and impactful experiences to our community.',
            'banner_image' => 'about-banner.png',
            'banner_title' => 'About Us',
            'banner_description' => '<p>We started our journey in 2012. And looking back it has been an awesome ride with lots of ups and downs. But whatever be the situation, we were always trying to move forward.</p><p>Icing croissant croissant jelly gummi bears cotton candy jujubes apple pie caramels. Dragée soufflé bonbon powder. Sesame snaps sugar plum chupa chups tart wafer caramels toffee.</p>',
            'about_image_1' => 'about-1.png',
            'about_content_1' => '<h3><strong>Our Mission</strong></h3><p>Our Mission is to enhance the growth of our clients’ business by transforms their needs into innovative &amp; worthwhile solutions. We aim to establish a unique satisfactory work culture to provide unmatched IT services.</p><p>We started our journey in 2012. And looking back it has been an awesome ride with lots of ups and downs. But whatever be the situation, we were always trying to move forward.</p>',
            'about_image_2' => 'about-2.png',
            'about_content_2' => '<h3><strong>Our Commitment</strong></h3><p>Our Commitment is to enhance the growth of our clients’ business by transforms their needs into innovative &amp; worthwhile solutions. We aim to establish a unique satisfactory work culture to provide unmatched IT services.</p><p>We started our journey in 2012. And looking back it has been an awesome ride with lots of ups and downs. But whatever be the situation, we were always trying to move forward.</p>',
        ]);
    }
}
