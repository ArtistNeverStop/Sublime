<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\ObjectType;
use App\GraphQL\Error\ValidationError;
use GraphQL\Error\FormattedError;
use Illuminate\Http\Request;
use App\GraphQL\Type\Type;
use GraphQL\Error\Debug;
use GraphQL\Type\Schema;
use GraphQL\Error\Error;
use GraphQL\GraphQL;
use Auth;

class GraphQLController extends Controller
{
    /**
     * Run the GraphQL query
     *
     */
    public function root(Request $request, string $query = null)
    {
        $myErrorFormatter = function (Error $error) {
            if ($error->getPrevious() instanceof ValidationError) {
                return array_merge(FormattedError::createFromException($error), [
                    'status' => $error->getPrevious()->validator->messages()->toArray()
                ]);
            }
            return FormattedError::createFromException($error);
        };
        $myErrorHandler = function (array $errors, callable $formatter) {
            return array_map($formatter, $errors);
        };
        return GraphQL::executeQuery(
            new Schema([
                'query' => Type::query(),
                'mutation' => Type::mutation(),
            ]),
            $query ?: $request->input('query'),
            null,
            Auth::user(),
            $request->input('variables'),
            $request->input('operationName')
        )->setErrorFormatter($myErrorFormatter)
        ->setErrorsHandler($myErrorHandler)
        ->toArray(true);
    }
}
