<?php
/**
 * Created by PhpStorm.
 * User: Faradars
 */
$config['uploads_path'] = 'uploads/';
$config['upload_images_path'] = $config['uploads_path']."images/";
$config['scope'] = '/panel/';
//Means[Assets] URLS
$config["MeansURL"] = 'means'. $config['scope'];
$config["MeansJS"] = 'means'. $config['scope']."scripts/";
//Views URLS
$config['ViewsPath'] = $config['scope'].'views/';
$config['TemplatePath'] = $config['scope'].'templates/';
$config['TemplateName']    = 'metis';
$config['ScriptsURL'] = $config['MeansURL'].'scripts/';
$config['TemplatesMeansURL'] = $config['MeansURL'].'templates/';
$config['TemplateMeansURL'] = $config['TemplatesMeansURL'].$config['TemplateName']."/";
$config['TemplateMeansCSS'] = $config['TemplateMeansURL']."styles/";
$config['TemplateMeansFonts'] = $config['TemplateMeansURL']."fonts/";
$config['TemplateMeansImages'] = $config['TemplateMeansURL']."img/";
$config['TemplateMeansJS'] = $config['TemplateMeansURL']."scripts/";
$config['TemplateMeansLib'] = $config['TemplateMeansURL']."lib/";
$config['TemplateMeansLess'] = $config['TemplateMeansURL']."less/";
$config['TemplateMeansPlugins'] = $config['TemplateMeansURL']."plugins/";
