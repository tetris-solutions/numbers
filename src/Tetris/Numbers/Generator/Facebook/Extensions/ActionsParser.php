<?php

namespace Tetris\Numbers\Generator\Facebook\Extensions;


use Tetris\Numbers\Base\Parser\ActionParser;
use Tetris\Numbers\Base\Sum\TrivialSum;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;
use function Tetris\Numbers\makeParserFromSource;
use function Tetris\Numbers\simpleSum;

class ActionsParser implements Extension
{
    use ExtensionApply;

    function __construct()
    {
        $this->map = [];
        $legacySource = makeParserFromSource('action');

        foreach (self::getActionTypes() as $actionType => $name) {
            $this->map[$actionType] = [
                'actionsProperty' => 'actions',
                'actionType' => $actionType,
                'traits' => [
                    'parser' => ActionParser::class,
                    'sum' => TrivialSum::class
                ],
                'fields' => ['actions'],
                'parse' => $legacySource('actions', $actionType),
                'sum' => simpleSum($actionType)
            ];
        }
    }

    static function getActionTypes(): array
    {
        return json_decode(file_get_contents(__DIR__ . '/../../../../../../maps/facebook-action-types.json'), true);
    }
}