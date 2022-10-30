<?php

namespace App\Enum;

enum LegalFrontendAssetTypes: string
{
    case CSS = 'css';
    case JavaScript = 'js';
    case SVG = 'svg';
    case HTM = 'htm';
    case HTML = 'html';
}
